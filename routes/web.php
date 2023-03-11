<?php

use App\Http\Controllers\HalamanController;
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

Route::get('/', [HalamanController::class, 'index']);
Route::get('/dashboard_admin', [HalamanController::class, 'dashboard_admin']);
Route::get('/tabel_pengguna', [HalamanController::class, 'tabel_pengguna']);
Route::get('/form_tambah_pengguna', [HalamanController::class, 'form_tambah_pengguna']);
Route::get('/isi_uang_elektronik', [HalamanController::class, 'isi_uang_elektronik']);
Route::get('/tarik_uang_elektronik', [HalamanController::class, 'tarik_uang_elektronik']);