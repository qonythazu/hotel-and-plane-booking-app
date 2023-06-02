<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use Illuminate\Http\Request;

class AddHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("halaman/mitra/form_tambah_kamar");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datavalid = $request->validate([
            'produk_id' => 'required',
            'harga' => 'required',
            'check_in' => 'required',
            'jumlah' => 'required'
        ]);

        kamar::create($datavalid);
        if(auth()->user()->role_id == 1){
            return redirect('/tabel_hotel')->with('success', 'kamar berhasil ditambahkan!');
        } elseif(auth()->user()->role_id == 2){
            return redirect('/halaman_mitra')->with('success', 'kamar berhasil ditambahkan!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = kamar::where('id', $id)->firstOrFail();
        return view("halaman/mitra/form_edit_kamar",[
            'produk' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kamar = kamar::find($id);
        $datavalid = $request->validate([
            'harga' => 'required|numeric',
            'check_in' => 'required',
            'jumlah' => 'required|numeric'
        ]);

        $kamar->check_in = $datavalid['check_in'];
        $kamar->harga = $datavalid['harga'];
        $kamar->jumlah = $datavalid['jumlah'];

        $kamar->save();

        if(auth()->user()->role_id == 1){
            return redirect('/tabel_hotel')->with('success', 'kamar berhasil diubah!');
        } elseif(auth()->user()->role_id == 2){
            return redirect('/halaman_mitra')->with('success', 'kamar berhasil diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kamar = kamar::find($id);
        $kamar->delete();

        if(auth()->user()->role_id == 1){
            return redirect('/tabel_hotel')->with('deleted', 'kamar berhasil dihapus!');
        } elseif(auth()->user()->role_id == 2){
            return redirect('/halaman_mitra')->with('deleted', 'kamar berhasil dihapus!');
        }
    }
}
