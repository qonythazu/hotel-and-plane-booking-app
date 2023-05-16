<?php

namespace App\Http\Controllers;

use App\Models\HistoryTransaksi;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class EwalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('halaman/admin/isi_uang_elektronik',[
            'saldo' => User::with('transaksi')->get(),
            'data' => transaksi::filter(request(['username']))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request['id'],$request['debit']);
        
        // tambah data 
        $transaksi = new HistoryTransaksi();
        $transaksi->user_id = $request['id'];
        $transaksi->debit = $request['debit'] ? $request['debit'] : 0;
        $transaksi->kredit = $request['kredit'] ? $request['kredit'] : 0;
        $transaksi->saldo_akhir = 0;
        $transaksi->keterangan = 'Penambahan saldo'; // Atur nilai keterangan sesuai kebutuhan
        $transaksi->save();

        // update transaksi
        // $ewallet = transaksi::where('id_user',$request['id']);
        // if($ewallet){
        //     $saldo_akhir = $ewallet->saldo_akhir + $request['debit'];
        //     $ewallet->update(['saldo_akhir' => $saldoAkhir]);
        //     $ewallet->update(['debit' => $request['debit']]);
        //     $ewallet->update(['keterangan' => 'Top Up saldo']);
            
            
        // } elseif(isset($request['kredit'])){
        //     $ewallet = transaksi::where('id_user',$request['id']);
        //     $saldo_akhir = $ewallet->saldo_akhir - $request['kredit'];
        //     $ewallet->update(['saldo_akhir' => $saldoAkhir]);
        //     $ewallet->update(['kredit' => $request['kredit']]);
        //     $ewallet->update(['keterangan' => 'Top Up saldo']);
        // }

        return redirect('/ewallet')->with('success', 'Saldo berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoryTransaksi  $historyTransaksi
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryTransaksi $historyTransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoryTransaksi  $historyTransaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        return view('halaman/admin/isi_uang_elektronik',[
            'saldo' => User::with('transaksi')->get(),
            'data' => transaksi::filter(request(['username']))->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoryTransaksi  $historyTransaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoryTransaksi $historyTransaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoryTransaksi  $historyTransaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoryTransaksi $historyTransaksi)
    {
        //
    }
}
