<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\transaksi;
use App\Models\produk;
use App\Models\role;
use App\Models\jadwal;
use App\Models\kamar;
use App\Models\booking;

use Illuminate\Support\Facades\Auth;

use DB;

class HalamanController extends Controller
{
    function dashboard_admin(){
        $countUsers = DB::table('users')->where('role_id', '=', 3)->count();
        $countMitra = DB::table('users')->where('role_id', '=', 2)->count();
        $countPesawat = DB::table('produks')->where('jenis_id', '=', 1)->count();
        $countHotel = DB::table('produks')->where('jenis_id', '=', 2)->count();

        return view("halaman/admin/dashboard_admin", compact('countUsers', 'countMitra', 'countPesawat', 'countHotel'));
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

    // function search(Request $request)
    // {
    //     $username = $request->input('username');
    //     $hasilPencarian = User::where('name', 'like', "%$username%")->get();

    //     return view('halaman/admin/isi_uang_elektronik', compact('hasilPencarian'));
    // }

    function tarik_uang_elektronik(){
        return view("halaman/admin/tarik_uang_elektronik");
    }

    function halaman_mitra(){
        $data = User::with('transaksi')->get();
        $produk = produk::with('jenis','user')
                  ->where('produks.user_id','=',auth()->user()->id)
                  ->get();

        return view("halaman/mitra/halaman_mitra",[
            'data' => $produk,
            'user' => $data
        ]);
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

    function booking_hotel($id){
        $data = kamar::with('produk')
            ->where('id','=',$id)
            ->get();
        return view("halaman/pengguna/booking",[
            'data' => $data,
        ]);
    }

    function booking_plane($id){
        $data = jadwal::with('produk')
            ->where('id','=',$id)
            ->get();
        return view("halaman/pengguna/bookingP",[
            'data' => $data,
        ]);
    }

    function pesanan(){
        $data1 = booking::with('kamar')
            ->where('user_id', Auth::user()->id)
            ->get();

        $data2 = booking::with('jadwal')
            ->where('user_id', Auth::user()->id)
            ->get();

        return view("halaman/pengguna/pesanan",[
            'data1' => $data1,
            'data2' => $data2
        ]);
    }
    function tambah_produk(){
        $produk = produk::with('jenis','user')->get();

        return view("halaman/tambah_produk",[
            'produk' => $produk
        ]);

    }
    function jadwals($id){
        $data = produk::where('id','=',$id)
            ->get();

        return view("halaman/admin/form_tambah_jadwals",[
            'produk' => $data
        ]);
    }
    function kamars($id){
        $data = produk::where('id','=',$id)
            ->get();

        return view("halaman/admin/form_tambah_kamar",[
            'produk' => $data
        ]);
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
       $data = kamar::with('produk')->get();

        return view("halaman/admin/tabel_hotel")->with('data', $data);
    }
    function tabel_pesawat(){
        $data = jadwal::with('produk')
        ->get();

         return view("halaman/admin/tabel_pesawat")->with('data', $data);
     }
}
