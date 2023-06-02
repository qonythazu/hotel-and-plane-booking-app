<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Illuminate\Http\Request;

class AddJadwalController extends Controller
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

        return view("halaman/mitra/form_tambah_jadwals");
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
            'kota_asal' => 'required|max:255',
            'kota_tiba' => 'required|max:255',
            'tgl_pergi' => 'required|date',
            'tgl_tiba' => 'required|date',
            'waktu_pergi' => 'required',
            'waktu_tiba' => 'required',
            'jumlah' => 'required',
            'harga' => 'required'
        ]);

        // dd($datavalid);

        jadwal::create($datavalid);

        if(auth()->user()->role_id == 1){
            return redirect('/tabel_pesawat')->with('success', 'jadwal berhasil ditambahkan!');
        } elseif(auth()->user()->role_id == 2){
            return redirect('/halaman_mitra')->with('success', 'jadwal berhasil ditambahkan!');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = jadwal::where('id', $id)->firstOrFail();
        return view("halaman/mitra/form_edit_jadwals",[
            'produk' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jadwal = jadwal::find($id);

        $datavalid = $request->validate([
            'produk_id' => 'required',
            'kota_asal' => 'required|max:255',
            'kota_tiba' => 'required|max:255',
            'tgl_pergi' => 'required|date',
            'tgl_tiba' => 'required|date',
            'waktu_pergi' => 'required',
            'waktu_tiba' => 'required',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric'
        ]);

        $jadwal->kota_asal = $datavalid['kota_asal'];
        $jadwal->kota_tiba = $datavalid['kota_tiba'];
        $jadwal->tgl_pergi = $datavalid['tgl_pergi'];
        $jadwal->tgl_tiba = $datavalid['tgl_tiba'];
        $jadwal->waktu_pergi = $datavalid['waktu_pergi'];
        $jadwal->waktu_tiba = $datavalid['waktu_tiba'];
        $jadwal->jumlah = $datavalid['jumlah'];
        $jadwal->harga = $datavalid['harga'];

        $jadwal->save();

        if(auth()->user()->role_id == 1){
            return redirect('/tabel_pesawat')->with('success', 'jadwal berhasil diubah!');
        } elseif(auth()->user()->role_id == 2){
            return redirect('/halaman_mitra')->with('success', 'jadwal berhasil diubah!');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = jadwal::find($id);
        $jadwal->delete();

        if(auth()->user()->role_id == 1){
            return redirect('/tabel_pesawat')->with('deleted', 'jadwal berhasil dihapus!');
        } elseif(auth()->user()->role_id == 2){
            return redirect('/halaman_mitra')->with('deleted', 'jadwal berhasil dihapus!');
        }
    }
}
