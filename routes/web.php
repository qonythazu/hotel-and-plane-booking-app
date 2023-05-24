<?php

use App\Models\produk;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\EwalletController;


use App\Http\Controllers\UserAccController;
use App\Http\Controllers\BookingHotelController;
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
Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard_admin', [HalamanController::class, 'dashboard_admin']);
    Route::get('/pengaturan_akun', [HalamanController::class, 'akun']);
    Route::get('/pengaturan_hotelpesawat', [HalamanController::class, 'pengaturan']);

    Route::get('/tabel_pengguna', [HalamanController::class, 'tabel_pengguna']);
    Route::post('/hapus_hotelpesawat', [ProdukController::class, 'destroy']);

    Route::resource('/daftar_akun', UserAccController::class);

    Route::get('/isi_uang_elektronik', [HalamanController::class, 'isi_uang_elektronik']);
    // Route::get('/search', [HalamanController::class, 'search'])->name('search');
    // Route::post('/add-saldo', [TransaksiController::class, 'addSaldo'])->name('add-saldo');

    Route::resource('/ewallet', EwalletController::class);

    Route::get('/tabel_mitra', [HalamanController::class, 'tabel_mitra']);
    Route::get('/tabel_hotel', [HalamanController::class, 'tabel_hotel']);
    Route::get('/tabel_pesawat', [HalamanController::class, 'tabel_pesawat']);
    Route::get('/form_tambah_hotelpesawat', [ProdukController::class, 'index']);
    Route::get('/tarik_uang_elektronik', [HalamanController::class, 'tarik_uang_elektronik']);
});

// PUNYA PENGGUNA //
Route::group(['middleware' => 'userAdmin'], function () {
    Route::resource('/hotel', BookingHotelController::class);

    Route::get('/pesanan_saya', [HalamanController::class, 'pesanan']);
    Route::get('/booking_hotel', [HalamanController::class, 'pengguna_book_hotel']);
    Route::get('/booking_pesawat', [HalamanController::class, 'pengguna_book_plane']);
    Route::get('/pesawat_search', [HalamanController::class, 'pesawat']);
    Route::get('/booking_hotel/{id}', [HalamanController::class, 'booking'])->name('booking.detail');
});

// PUNYA MITRA //
Route::group(['middleware' => 'mitraAdmin'], function () {

    Route::get('/halaman_mitra', [HalamanController::class, 'halaman_mitra']);

// PUNYA MITRA & ADMIN //
    Route::get('/tambah_produk', [HalamanController::class, 'tambah_produk']);
});

// PUNYA UMUM //
Route::get('/dashboard', [HalamanController::class, 'dashboard'])->middleware('auth');
Route::get('/', [SessionController::class, 'index'])->name('login')->middleware('guest');
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/logout', [SessionController::class, 'logout']);
