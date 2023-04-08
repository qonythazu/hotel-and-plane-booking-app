<?php

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\addUserController;
use Illuminate\Support\Facades\Route;

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
Route::get('/tabel_pengguna', [HalamanController::class, 'tabel_pengguna'])->middleware('auth');
Route::get('/form_tambah_pengguna', [addUserController::class, 'index'])->middleware('auth');
Route::post('/form_tambah_pengguna', [addUserController::class, 'store']);
Route::get('/isi_uang_elektronik', [HalamanController::class, 'isi_uang_elektronik'])->middleware('auth');
Route::get('/tabel_mitra', [HalamanController::class, 'tabel_mitra'])->middleware('auth');

// PUNYA PENGGUNA //
Route::get('/pengguna_book_hotel', [HalamanController::class, 'pengguna_book_hotel'])->middleware('auth');
Route::get('/pengguna_book_plane', [HalamanController::class, 'pengguna_book_plane'])->middleware('auth');

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