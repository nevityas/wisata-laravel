<?php

use App\Http\Controllers\PaketWisataController;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Route;
use illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('daftarpaket', \App\Http\Controllers\DaftarPaketController::class)->middleware('auth');
Route::resource('paketwisata', \App\Http\Controllers\PaketWisataController::class)->middleware('auth');
Route::resource('karyawan', \App\Http\Controllers\KaryawanController::class)->middleware('auth');
Route::resource('pelanggan', \App\Http\Controllers\PelangganController::class)->middleware('auth');
Route::resource('reservasi', \App\Http\Controllers\ReservasiController::class)->middleware('auth');
Route::get('/cetak', [\App\Http\Controllers\ReservasiController::class, 'cetak'])->name('cetak');
