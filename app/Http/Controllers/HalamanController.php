<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\transaksi;

use DB;

class HalamanController extends Controller
{
    function dashboard_admin(){
        return view("halaman/admin/dashboard_admin");
    }

    function akun(){
        $data = DB::table('Users')
            ->join('roles','roles.id','=','Users.role_id')
            ->select('Users.name as name','Users.email as email','roles.role as role')
            ->get();
        return view("halaman/admin/pengaturan_akun")->with('data', $data);
    }

    function tabel_pengguna(){
        $data = DB::table('Users')
            ->join('roles','roles.id','=','Users.role_id')
            ->join('transaksis','transaksis.user_id','=','Users.id')
            ->select('Users.id as id','Users.name as name','Users.email as email', 'transaksis.saldo_akhir as saldo','roles.role as role')
            ->where('Users.id','=',3)
            ->get();
        return view("halaman/admin/tabel_pengguna")->with('data', $data);
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
    function tabel_mitra(){
        return view("halaman/admin/tabel_mitra");
    }
    function tabel_hotel(){
        return view("halaman/admin/tabel_hotel");
    }
}
