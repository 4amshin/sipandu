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


    public function index()
    {
        $daftarPenduduk = Penduduk::all();
        $daftarKelahiran = Kelahiran::all();
        $daftarKematian = Kematian::all();
        $daftarPendatang = Pendatang::all();
        $daftarPindahan = Pindahan::all();

        $tabs = [
            [
                'id' => 'penduduk',
                'title' => 'Data Penduduk',
                'view' => 'admin.laporan.laporan-penduduk',
            ],
            [
                'id' => 'kelahiran',
                'title' => 'Data Kelahiran',
                'view' => 'admin.laporan.laporan-kelahiran',
            ],
            [
                'id' => 'kematian',
                'title' => 'Data Kematian',
                'view' => 'admin.laporan.laporan-kematian',
            ],
            [
                'id' => 'pendatang',
                'title' => 'Data Pendatang',
                'view' => 'admin.laporan.laporan-pendatang',
            ],
            [
                'id' => 'pindahan',
                'title' => 'Data Pindahan',
                'view' => 'admin.laporan.laporan-pindahan',
            ],
        ];

        return view('admin.laporan.laporan', compact('tabs', 'daftarPenduduk', 'daftarKelahiran', 'daftarKematian', 'daftarPendatang', 'daftarPindahan'));
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
