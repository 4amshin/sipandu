<?php

namespace App\Http\Controllers;

use App\Exports\KelahiranExport;
use App\Exports\KematianExport;
use App\Exports\LaporanExport;
use App\Exports\PendatangExport;
use App\Exports\PendudukExport;
use App\Exports\PindahanExport;
use App\Models\Kelahiran;
use App\Models\Kematian;
use App\Models\Pendatang;
use App\Models\Penduduk;
use App\Models\Pindahan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function home()
    {
        $jumlahPenduduk = Penduduk::count();
        $jumlahKartuKeluarga = Penduduk::distinct('no_kk')->count('no_kk');
        $jumlahKelahiran = Kelahiran::count();
        $jumlahKematian = Kematian::count();
        $jumlahPindahan = Pindahan::count();
        $jumlahPendatang = Pendatang::count();

        return view('home', compact(
            'jumlahPenduduk',
            'jumlahKartuKeluarga',
            'jumlahKelahiran',
            'jumlahKematian',
            'jumlahPindahan',
            'jumlahPendatang'
        ));
    }

    public function index(Request $request)
    {
        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');
        // dd($bulan, $tahun);

        $dusunList = [];
        if (!$bulan || !$tahun) {
            return view('admin.laporan.laporan-kependudukan', compact('dusunList'));
        }

        $jumlahKK = Penduduk::select('dusun', 'jenis_kelamin', DB::raw('COUNT(*) as jumlah'))
            ->where('role', 'kepala_keluarga')
            ->groupBy('dusun', 'jenis_kelamin')
            ->get();

        $pendudukAwal = Penduduk::select('jenis_kelamin', 'dusun', DB::raw('COUNT(*) as jumlah'))
            ->whereDate('created_at', '<=', Carbon::createFromDate($tahun, $bulan, 1)->subDay())
            ->groupBy('dusun', 'jenis_kelamin')
            ->get();

        $lahir = Kelahiran::select('jenis_kelamin', 'dusun', DB::raw('COUNT(*) as jumlah'))
            ->where(function ($query) use ($bulan, $tahun) {
                $currentDate = Carbon::now();
                $inputDate = Carbon::createFromDate($tahun, $bulan);

                // Tentukan tanggal akhir untuk filter
                $tanggalAkhir = $inputDate->isSameMonth($currentDate)
                    ? $currentDate->endOfDay() // Tanggal hari ini jika bulan & tahun sama dengan sekarang
                    : $inputDate->endOfMonth(); // Tanggal akhir bulan jika bulan & tahun adalah waktu lalu

                // Tambahkan kondisi filter berdasarkan tanggal
                $query->whereDate('tanggal_lahir', '<=', $tanggalAkhir);
            })
            ->groupBy('dusun', 'jenis_kelamin')
            ->get();

        $meninggal = Kematian::select('jenis_kelamin', 'dusun', DB::raw('COUNT(*) as jumlah'))
            ->where(function ($query) use ($bulan, $tahun) {
                $currentDate = Carbon::now();
                $inputDate = Carbon::createFromDate($tahun, $bulan);

                // Tentukan tanggal akhir untuk filter
                $tanggalAkhir = $inputDate->isSameMonth($currentDate)
                    ? $currentDate->endOfDay() // Tanggal hari ini jika bulan & tahun sama dengan sekarang
                    : $inputDate->endOfMonth(); // Tanggal akhir bulan jika bulan & tahun adalah waktu lalu

                // Tambahkan kondisi filter berdasarkan tanggal
                $query->whereDate('tanggal_kematian', '<=', $tanggalAkhir);
            })
            ->groupBy('dusun', 'jenis_kelamin')
            ->get();

        $pendatang = Pendatang::select('jenis_kelamin', 'dusun', DB::raw('COUNT(*) as jumlah'))
            ->where(function ($query) use ($bulan, $tahun) {
                $currentDate = Carbon::now();
                $inputDate = Carbon::createFromDate($tahun, $bulan);

                // Tentukan tanggal akhir untuk filter
                $tanggalAkhir = $inputDate->isSameMonth($currentDate)
                    ? $currentDate->endOfDay() // Tanggal hari ini jika bulan & tahun sama dengan sekarang
                    : $inputDate->endOfMonth(); // Tanggal akhir bulan jika bulan & tahun adalah waktu lalu

                // Tambahkan kondisi filter berdasarkan tanggal
                $query->whereDate('tanggal_datang', '<=', $tanggalAkhir);
            })
            ->groupBy('dusun', 'jenis_kelamin')
            ->get();

        $pindahan = Pindahan::select('jenis_kelamin', 'dusun', DB::raw('COUNT(*) as jumlah'))
            ->where(function ($query) use ($bulan, $tahun) {
                $currentDate = Carbon::now();
                $inputDate = Carbon::createFromDate($tahun, $bulan);

                // Tentukan tanggal akhir untuk filter
                $tanggalAkhir = $inputDate->isSameMonth($currentDate)
                    ? $currentDate->endOfDay() // Tanggal hari ini jika bulan & tahun sama dengan sekarang
                    : $inputDate->endOfMonth(); // Tanggal akhir bulan jika bulan & tahun adalah waktu lalu

                // Tambahkan kondisi filter berdasarkan tanggal
                $query->whereDate('tanggal_pindah', '<=', $tanggalAkhir);
            })
            ->groupBy('dusun', 'jenis_kelamin')
            ->get();

        $pendudukAkhir = Penduduk::select('dusun', 'jenis_kelamin', DB::raw('COUNT(*) as jumlah'))
            ->whereDate('created_at', '<=', Carbon::createFromDate($tahun, $bulan)->endOfMonth())
            ->groupBy('dusun', 'jenis_kelamin')
            ->get();

        $dusunList = ['Salu Patani', 'Batu Tongkon', 'Toro'];
        $laporan = compact('jumlahKK', 'pendudukAwal', 'lahir', 'meninggal', 'pendatang', 'pindahan', 'pendudukAkhir');


        return view('admin.laporan.laporan-kependudukan', compact('laporan', 'dusunList'));
    }

    public function exportLaporan(Request $request)
    {
        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');

        $jumlahKK = Penduduk::select('dusun', 'jenis_kelamin', DB::raw('COUNT(*) as jumlah'))
            ->where('role', 'kepala_keluarga')
            ->groupBy('dusun', 'jenis_kelamin')
            ->get();

        $pendudukAwal = Penduduk::select('jenis_kelamin', 'dusun', DB::raw('COUNT(*) as jumlah'))
            ->whereDate('created_at', '<=', Carbon::createFromDate($tahun, $bulan, 1)->subDay())
            ->groupBy('dusun', 'jenis_kelamin')
            ->get();

        $lahir = Kelahiran::select('jenis_kelamin', 'dusun', DB::raw('COUNT(*) as jumlah'))
            ->where(function ($query) use ($bulan, $tahun) {
                $currentDate = Carbon::now();
                $inputDate = Carbon::createFromDate($tahun, $bulan);

                // Tentukan tanggal akhir untuk filter
                $tanggalAkhir = $inputDate->isSameMonth($currentDate)
                    ? $currentDate->endOfDay() // Tanggal hari ini jika bulan & tahun sama dengan sekarang
                    : $inputDate->endOfMonth(); // Tanggal akhir bulan jika bulan & tahun adalah waktu lalu

                // Tambahkan kondisi filter berdasarkan tanggal
                $query->whereDate('tanggal_lahir', '<=', $tanggalAkhir);
            })
            ->groupBy('dusun', 'jenis_kelamin')
            ->get();

        $meninggal = Kematian::select('jenis_kelamin', 'dusun', DB::raw('COUNT(*) as jumlah'))
            ->where(function ($query) use ($bulan, $tahun) {
                $currentDate = Carbon::now();
                $inputDate = Carbon::createFromDate($tahun, $bulan);

                // Tentukan tanggal akhir untuk filter
                $tanggalAkhir = $inputDate->isSameMonth($currentDate)
                    ? $currentDate->endOfDay() // Tanggal hari ini jika bulan & tahun sama dengan sekarang
                    : $inputDate->endOfMonth(); // Tanggal akhir bulan jika bulan & tahun adalah waktu lalu

                // Tambahkan kondisi filter berdasarkan tanggal
                $query->whereDate('tanggal_kematian', '<=', $tanggalAkhir);
            })
            ->groupBy('dusun', 'jenis_kelamin')
            ->get();

        $pendatang = Pendatang::select('jenis_kelamin', 'dusun', DB::raw('COUNT(*) as jumlah'))
            ->where(function ($query) use ($bulan, $tahun) {
                $currentDate = Carbon::now();
                $inputDate = Carbon::createFromDate($tahun, $bulan);

                // Tentukan tanggal akhir untuk filter
                $tanggalAkhir = $inputDate->isSameMonth($currentDate)
                    ? $currentDate->endOfDay() // Tanggal hari ini jika bulan & tahun sama dengan sekarang
                    : $inputDate->endOfMonth(); // Tanggal akhir bulan jika bulan & tahun adalah waktu lalu

                // Tambahkan kondisi filter berdasarkan tanggal
                $query->whereDate('tanggal_datang', '<=', $tanggalAkhir);
            })
            ->groupBy('dusun', 'jenis_kelamin')
            ->get();

        $pindahan = Pindahan::select('jenis_kelamin', 'dusun', DB::raw('COUNT(*) as jumlah'))
            ->where(function ($query) use ($bulan, $tahun) {
                $currentDate = Carbon::now();
                $inputDate = Carbon::createFromDate($tahun, $bulan);

                // Tentukan tanggal akhir untuk filter
                $tanggalAkhir = $inputDate->isSameMonth($currentDate)
                    ? $currentDate->endOfDay() // Tanggal hari ini jika bulan & tahun sama dengan sekarang
                    : $inputDate->endOfMonth(); // Tanggal akhir bulan jika bulan & tahun adalah waktu lalu

                // Tambahkan kondisi filter berdasarkan tanggal
                $query->whereDate('tanggal_pindah', '<=', $tanggalAkhir);
            })
            ->groupBy('dusun', 'jenis_kelamin')
            ->get();

        $pendudukAkhir = Penduduk::select('dusun', 'jenis_kelamin', DB::raw('COUNT(*) as jumlah'))
            ->whereDate('created_at', '<=', Carbon::createFromDate($tahun, $bulan)->endOfMonth())
            ->groupBy('dusun', 'jenis_kelamin')
            ->get();

        $laporan = [
            'jumlahKK' => $jumlahKK,
            'pendudukAwal' => $pendudukAwal,
            'lahir' => $lahir,
            'meninggal' => $meninggal,
            'pendatang' => $pendatang,
            'pindahan' => $pindahan,
            'pendudukAkhir' => $pendudukAkhir,
        ];

        $dusunList = ['Salu Patani', 'Batu Tongkon', 'Toro'];

        return Excel::download(new LaporanExport($laporan, $dusunList, $bulan, $tahun), 'laporan_penduduk.xlsx');
    }

    public function exportDataPenduduk()
    {
        $namaFile = 'data_penduduk_' . Carbon::now()->format('d-m-Y') . '.xlsx';

        return Excel::download(new PendudukExport, $namaFile);
    }

    public function exportDataKelahiran()
    {
        $namaFile = 'data_kelahiran_' . Carbon::now()->format('d-m-Y') . '.xlsx';

        return Excel::download(new KelahiranExport, $namaFile);
    }

    public function exportDataKematian()
    {
        $namaFile = 'data_kematian_' . Carbon::now()->format('d-m-Y') . '.xlsx';

        return Excel::download(new KematianExport, $namaFile);
    }

    public function exportDataPendatang()
    {
        $namaFile = 'data_pendatang_' . Carbon::now()->format('d-m-Y') . '.xlsx';

        return Excel::download(new PendatangExport, $namaFile);
    }

    public function exportDataPindahan()
    {
        $namaFile = 'data_pindahan_' . Carbon::now()->format('d-m-Y') . '.xlsx';

        return Excel::download(new PindahanExport, $namaFile);
    }
}
