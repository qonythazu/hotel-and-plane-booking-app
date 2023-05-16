<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAccController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\EwalletController;


use App\Models\produk;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// PUNYA ADMIN //
Route::get('/dashboard_admin', [HalamanController::class, 'dashboard_admin'])->middleware('auth');
Route::get('/pengaturan_akun', [HalamanController::class, 'akun'])->middleware('auth');
Route::get('/pengaturan_hotelpesawat', [HalamanController::class, 'pengaturan'])->middleware('auth');

Route::get('/tabel_pengguna', [HalamanController::class, 'tabel_pengguna'])->middleware('auth');
Route::post('/hapus_hotelpesawat', [ProdukController::class, 'destroy']);

Route::resource('/daftar_akun', UserAccController::class)->middleware('auth');

Route::get('/isi_uang_elektronik', [HalamanController::class, 'isi_uang_elektronik'])->middleware('auth');
// Route::get('/search', [HalamanController::class, 'search'])->name('search');
// Route::post('/add-saldo', [TransaksiController::class, 'addSaldo'])->name('add-saldo');

Route::resource('/ewallet', EwalletController::class)->middleware('auth');

Route::get('/tabel_mitra', [HalamanController::class, 'tabel_mitra'])->middleware('auth');
Route::get('/tabel_hotel', [HalamanController::class, 'tabel_hotel'])->middleware('auth');
Route::get('/tabel_pesawat', [HalamanController::class, 'tabel_pesawat'])->middleware('auth');
Route::get('/form_tambah_hotelpesawat', [ProdukController::class, 'index'])->middleware('auth');

// PUNYA PENGGUNA //
Route::get('/booking_hotel', [HalamanController::class, 'pengguna_book_hotel'])->middleware('auth');
Route::get('/booking_pesawat', [HalamanController::class, 'pengguna_book_plane'])->middleware('auth');
Route::get('/pesawat_search', [HalamanController::class, 'pesawat'])->middleware('auth');
Route::get('/hotel_search', [HalamanController::class, 'hotel'])->middleware('auth');
Route::get('/booking_hotel/{id}', [HalamanController::class, 'booking'])->middleware('auth')->name('booking.detail');

// PUNYA MITRA //
Route::get('/halaman_mitra', [HalamanController::class, 'halaman_mitra'])->middleware('auth');
Route::get('/tarik_uang_elektronik', [HalamanController::class, 'tarik_uang_elektronik'])->middleware('auth');

// PUNYA MITRA & ADMIN //
Route::get('/tambah_produk', [HalamanController::class, 'tambah_produk'])->middleware('auth');

// PUNYA UMUM //
Route::get('/dashboard', [HalamanController::class, 'dashboard'])->middleware('auth');
Route::get('/', [SessionController::class, 'index'])->name('login')->middleware('guest');
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/logout', [SessionController::class, 'logout']);
