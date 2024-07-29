<?php

use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\PendatangController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PindahanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    /*-------------------------------HOME-------------------------------*/
    Route::get('home', [LaporanController::class, 'home'])->name('home');

    /*-------------------------------PENGGUNA-------------------------------*/
    Route::resource('pengguna', PenggunaController::class);


    /*-------------------------------PENDUDUK-------------------------------*/
    Route::resource('penduduk', PendudukController::class);


    /*-------------------------------KELAHIRAN-------------------------------*/
    Route::resource('kelahiran', KelahiranController::class);


    /*-------------------------------KEMATIAN-------------------------------*/
    Route::resource('kematian', KematianController::class);


    /*-------------------------------PENDATANG-------------------------------*/
    Route::resource('pendatang', PendatangController::class);


    /*-------------------------------PINDAHAN-------------------------------*/
    Route::resource('pindahan', PindahanController::class);


    /*-------------------------------LAPORAN-------------------------------*/
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');


    /*-------------------------------EXPORT DATA-------------------------------*/
    Route::get('export/laporan-penduduk', [LaporanController::class, 'exportDataPenduduk'])->name('export.penduduk');
    Route::get('export/laporan-kelahiran', [LaporanController::class, 'exportDataKelahiran'])->name('export.kelahiran');
    Route::get('export/laporan-kematian', [LaporanController::class, 'exportDataKematian'])->name('export.kematian');
    Route::get('export/laporan-pendatang', [LaporanController::class, 'exportDataPendatang'])->name('export.pendatang');
    Route::get('export/laporan-pindahan', [LaporanController::class, 'exportDataPindahan'])->name('export.pindahan');
});
