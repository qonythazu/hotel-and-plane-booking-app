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
    public function index(Request $request)
    {
        $username = $request->input('username');

        return view('halaman/admin/isi_uang_elektronik', [
            'saldo' => User::with('transaksi')->get(),
            'data' => transaksi::filter(['username' => $username])->get(),
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
        $transaksi->keterangan = 'Perubahan saldo';
        $transaksi->save();

        // update transaksi
        if(isset($request['debit'])){
            $ewallet = transaksi::where('user_id',$request['id'])->first();
            $ewallet->update(['saldo_awal' => $ewallet->saldo_akhir]);
            $saldo_akhir = $ewallet->saldo_akhir + $request['debit'];
            $ewallet->update(['saldo_akhir' => $saldo_akhir]);
            $ewallet->update(['debit' => $request['debit']]);
            $ewallet->update(['kredit' => 0]);
            $ewallet->update(['keterangan' => 'Top Up saldo']);


        } elseif(isset($request['kredit'])){
            $ewallet = transaksi::where('user_id',$request['id'])->first();
            $ewallet->update(['saldo_awal' => $ewallet->saldo_akhir]);
            $saldo_akhir = $ewallet->saldo_akhir - $request['kredit'];
            $ewallet->update(['saldo_akhir' => $saldo_akhir]);
            $ewallet->update(['debit' => 0]);
            $ewallet->update(['kredit' => $request['kredit']]);
            $ewallet->update(['keterangan' => 'Penarikan saldo']);
        }

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
