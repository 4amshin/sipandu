<?php

use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\MeninggalController;
use App\Http\Controllers\PendatangController;
use App\Http\Controllers\PendudukController;
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
    Route::get('home', function () {
        return view('home');
    })->name('home');

    Route::resource('penduduk', PendudukController::class);
    Route::resource('kelahiran', KelahiranController::class);
    Route::resource('meninggal', MeninggalController::class);
    Route::resource('pendatang', PendatangController::class);
    Route::resource('pindahan', PindahanController::class);
});
