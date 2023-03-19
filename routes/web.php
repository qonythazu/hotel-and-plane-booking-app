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


Route::get('/dashboard_admin', [HalamanController::class, 'dashboard_admin']);
Route::get('/tabel_pengguna', [HalamanController::class, 'tabel_pengguna']);
// Route::get('/form_tambah_pengguna', [HalamanController::class, 'form_tambah_pengguna']);
Route::get('/isi_uang_elektronik', [HalamanController::class, 'isi_uang_elektronik']);
Route::get('/tarik_uang_elektronik', [HalamanController::class, 'tarik_uang_elektronik']);
Route::get('/halaman_mitra', [HalamanController::class, 'halaman_mitra']);
Route::get('/tambah_produk', [HalamanController::class, 'tambah_produk']);
Route::get('/pengguna_book_hotel', [HalamanController::class, 'pengguna_book_hotel']);
Route::get('/pengguna_book_plane', [HalamanController::class, 'pengguna_book_plane']);

Route::get('/', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/logout', [SessionController::class, 'logout']);

Route::get('/form_tambah_pengguna', [addUserController::class, 'index']);
Route::post('/form_tambah_pengguna', [addUserController::class, 'store']);

