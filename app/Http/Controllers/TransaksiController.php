<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
    public function index(){

        return view('halaman/admin/isi_uang_elektronik');
    }

    public function addSaldo(Request $request)
    {
        $user = $request->user(); // Mengambil data user dari request

        $saldoTambah = $request->input('saldo');

        $transaksi = new Transaksi();
        $transaksi->user_id = $user->id;
        $transaksi->saldo_akhir = $user->saldo_akhir + $saldoTambah;
        $transaksi->keterangan = 'Penambahan saldo'; // Atur nilai keterangan sesuai kebutuhan
        $transaksi->save();

        return redirect()->back()->with('success', 'Saldo berhasil ditambahkan.');
    }
}
