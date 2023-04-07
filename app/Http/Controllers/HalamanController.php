<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function dashboard_admin(){
        return view("halaman/admin/dashboard_admin");
    }
    function tabel_pengguna(){
        return view("halaman/admin/tabel_pengguna");
    }
    function isi_uang_elektronik(){
        return view("halaman/admin/isi_uang_elektronik");
    }
    function tarik_uang_elektronik(){
        return view("halaman/admin/tarik_uang_elektronik");
    }
    function halaman_mitra(){
        return view("halaman/mitra/halaman_mitra");
    }
    function pengguna_book_hotel(){
        return view("halaman/pengguna/pengguna_book_hotel");
    }
    function pengguna_book_plane(){
        return view("halaman/pengguna/pengguna_book_plane");
    }
    function tambah_produk(){
        return view("halaman/tambah_produk");
    }
    function dashboard(){
        return view("halaman/dashboard");
    }
}