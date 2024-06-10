<?php

use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MeninggalController;
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
    Route::get('home', function () {
        return view('home');
    })->name('home');

    /*-------------------------------PENGGUNA-------------------------------*/
    Route::resource('pengguna', PenggunaController::class);


    /*-------------------------------PENDUDUK-------------------------------*/
    Route::resource('penduduk', PendudukController::class);


    /*-------------------------------KELAHIRAN-------------------------------*/
    Route::resource('kelahiran', KelahiranController::class);


    /*-------------------------------MENINGGAL-------------------------------*/
    Route::resource('meninggal', MeninggalController::class);


    /*-------------------------------PENDATANG-------------------------------*/
    Route::resource('pendatang', PendatangController::class);


    /*-------------------------------PINDAHAN-------------------------------*/
    Route::resource('pindahan', PindahanController::class);


    /*-------------------------------LAPORAN-------------------------------*/
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
});
