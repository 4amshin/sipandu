<?php

namespace App\Http\Controllers;

use App\Models\Kelahiran;
use App\Models\Kematian;
use App\Models\Pendatang;
use App\Models\Penduduk;
use App\Models\Pindahan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
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

        return view('admin.laporan.laporan', compact('tabs','daftarPenduduk', 'daftarKelahiran', 'daftarKematian', 'daftarPendatang', 'daftarPindahan'));
    }
}
