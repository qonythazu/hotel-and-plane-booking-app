<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\transaksi;
use App\Models\produk;
use App\Models\role;
use App\Models\jadwal;
use App\Models\kamar;


use DB;

class HalamanController extends Controller
{
    function dashboard_admin(){
        return view("halaman/admin/dashboard_admin");
    }

    function akun(){
        $data = User::with('role')->get();

        return view("halaman/admin/pengaturan_akun")->with('data', $data);
    }

    function tabel_pengguna(){
        $data = User::with('role','transaksi')
            ->where('Users.role_id','=',3)
            ->get();

        return view("halaman/admin/tabel_pengguna")->with('data', $data);
    }
    function pengaturan(){
        return view("halaman/admin/pengaturan_hotelpesawat");
    }
    function isi_uang_elektronik(){
        return view("halaman/admin/isi_uang_elektronik");
    }
    function tarik_uang_elektronik(){
        return view("halaman/admin/tarik_uang_elektronik");
    }
    function halaman_mitra(){
        $data = DB::table('produks')
            ->select('produks.nama_produk as name','produks.produk as tipe', 'produks.deskripsi as deskripsi')
            ->get();
        return view("halaman/mitra/halaman_mitra")->with('data', $data);
    }
    function pengguna_book_hotel(){
        $data = User::with('transaksi')->get();

        $produk = produk::with('jenis')
        ->where('produks.jenis_id','=', 2)
        ->get();

        return view("halaman/pengguna/pengguna_book_hotel",[
            'data' => $data,
            'produk' => $produk
        ]);
    }
    function pengguna_book_plane(){
        $data = User::with('transaksi')->get();

        $produk = jadwal::with('produk')->get();

        return view("halaman/pengguna/pengguna_book_plane",[
            'data' => $data,
            'produk' => $produk
        ]);
    }
    function pesawat(){
        $data = User::with('transaksi')->get();
        $produk = jadwal::with('produk')->get();

        return view("halaman/pengguna/pesawat",[
            'data' => $data,
            'produk' => $produk
        ]);
    }
    function hotel(){
        $data = user::with('transaksi')->get();

        $produk = produk::with('jenis')
        ->where('produks.jenis_id','=', 2)
        ->get();

        return view("halaman/pengguna/hotel",[
            'data' => $data,
            'produk' => $produk
        ]);
    }

    function booking($produk){
        $data = kamar::with('produk')
            ->where('kamars.produk_id','=',$produk)
            ->get();

        return view("halaman/pengguna/booking",[
            'data' => $data,
        ]);
    }

    function tambah_produk(){
        return view("halaman/tambah_produk");
    }
    function dashboard(){
        return view("halaman/dashboard");
    }
    function tabel_mitra(){
        $data = User::with('role','transaksi')
            ->where('Users.role_id','=',2)
            ->get();

        return view("halaman/admin/tabel_mitra")->with('data', $data);
    }
    function tabel_hotel(){
       $data = produk::with('jenis')
       ->where('produks.jenis_id', '=', 2)
       ->get();
       
        return view("halaman/admin/tabel_hotel")->with('data', $data);
    }
    function tabel_pesawat(){
        $data = jadwal::with('produk')
        ->get();
        
         return view("halaman/admin/tabel_pesawat")->with('data', $data);
     }
}
