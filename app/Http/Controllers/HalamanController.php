<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function dashboard_admin(){
        return view("halaman/dashboard_admin");
    }
    function tabel_pengguna(){
        return view("halaman/tabel_pengguna");
    }
    function form_tambah_pengguna(){
        return view("halaman/form_tambah_pengguna");
    }
    function isi_uang_elektronik(){
        return view("halaman/isi_uang_elektronik");
    }
    function tarik_uang_elektronik(){
        return view("halaman/tarik_uang_elektronik");
    }
    function halaman_mitra(){
        return view("halaman/halaman_mitra");
    }
    function tambah_produk(){
        return view("halaman/tambah_produk");
    }
    function pengguna_book_hotel(){
        return view("halaman/pengguna_book_hotel");
    }
    function pengguna_book_plane(){
        return view("halaman/pengguna_book_plane");
    }
}
