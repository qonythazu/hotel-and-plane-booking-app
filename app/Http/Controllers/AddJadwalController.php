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

        return view("halaman/admin/form_tambah_jadwals");
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

        return redirect('/tabel_pesawat')->with('success', 'jadwal berhasil ditambahkan!');

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
    public function edit(jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(jadwal $jadwal)
    {
        //
    }
}
