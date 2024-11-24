<?php

namespace App\Http\Controllers;

use App\Exports\KelahiranExport;
use App\Exports\KematianExport;
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

        $pendudukAwal = Penduduk::select('dusun', 'jenis_kelamin', DB::raw('COUNT(*) as jumlah'))
            ->whereDate('created_at', '<=', "$tahun-$bulan-14")
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

        // $pindahan = Pindahan::select('jenis_kelamin', 'dusun', DB::raw('COUNT(*) as jumlah'))
        //     ->whereMonth('tanggal_pindah', $bulan)
        //     ->whereYear('tanggal_pindah', $tahun)
        //     ->groupBy('dusun', 'jenis_kelamin')
        //     ->get();

        // $pendudukAkhir = Penduduk::select('dusun', 'jenis_kelamin', DB::raw('COUNT(*) as jumlah'))
        //     ->whereDate('created_at', '<=', "$tahun-$bulan-" . date('t', strtotime("$tahun-$bulan-01")))
        //     ->groupBy('dusun', 'jenis_kelamin')
        //     ->get();

        $dusunList = ['Salu Patani', 'Batu Tongkon', 'Toro'];
        $laporan = compact('pendudukAwal', 'lahir', 'meninggal', 'pendatang', 'pindahan');
        // $laporan = compact('pendudukAwal', 'lahir', 'meninggal', 'pendatang', 'pindahan', 'pendudukAkhir');
        // dd($laporan);

        return view('admin.laporan.laporan-kependudukan', compact('laporan', 'dusunList'));
    }


    //OLD METHOD
    // public function index()
    // {
    //     $daftarPenduduk = Penduduk::all();
    //     $daftarKelahiran = Kelahiran::all();
    //     $daftarKematian = Kematian::all();
    //     $daftarPendatang = Pendatang::all();
    //     $daftarPindahan = Pindahan::all();

    //     $tabs = [
    //         [
    //             'id' => 'penduduk',
    //             'title' => 'Data Penduduk',
    //             'view' => 'admin.laporan.laporan-penduduk',
    //         ],
    //         [
    //             'id' => 'kelahiran',
    //             'title' => 'Data Kelahiran',
    //             'view' => 'admin.laporan.laporan-kelahiran',
    //         ],
    //         [
    //             'id' => 'kematian',
    //             'title' => 'Data Kematian',
    //             'view' => 'admin.laporan.laporan-kematian',
    //         ],
    //         [
    //             'id' => 'pendatang',
    //             'title' => 'Data Pendatang',
    //             'view' => 'admin.laporan.laporan-pendatang',
    //         ],
    //         [
    //             'id' => 'pindahan',
    //             'title' => 'Data Pindahan',
    //             'view' => 'admin.laporan.laporan-pindahan',
    //         ],
    //     ];

    //     return view('admin.laporan.laporan', compact('tabs', 'daftarPenduduk', 'daftarKelahiran', 'daftarKematian', 'daftarPendatang', 'daftarPindahan'));
    // }


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
