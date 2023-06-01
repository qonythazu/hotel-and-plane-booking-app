<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\jenis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProdukNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $datavalid = $request->validate([
            'nama_produk' => 'required|max:255',
            'jenis_id' => 'required',
            'user_id' => 'required',
            'deskripsi' => 'required'
        ]);

        // dd($datavalid);

        produk::create($datavalid);

        return redirect('/halaman_mitra')->with('success', 'akun berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function show(jenis $jenis)
    {
        // $produk = produk::find($jenis);

        // if (!$produk) {
        //     return response()->json([
        //         'message' => 'produk not found'
        //     ], 404);
        // }

        // return response()->json([
        //     'data' => $produk
        // ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = produk::with('jenis','user')
                 ->where('id', $id)->firstOrFail();

        return view('halaman/tambah_produk2', [
            'produk' => $produk
        ]);


    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jenis $jenis)
    {
        $produk = produk::find($jenis);
        $productTypeValues = ['Pesawat', 'Hotel'];

        $datavalid = $request->validate([
        'nama_produk' => 'max:255',
        'produk' => [Rule::in($productTypeValues)],
        'user_id' => 'required',
        'deskripsi' => 'sometimes'
        ]);

        $produk->nama_produk = $datavalid['nama_produk'];
        $produk->produk = $datavalid['produk'];
        $produk->user_id = $datavalid['user_id'];
        $produk->deskripsi = $datavalid['deskripsi'];

        $produk->save();

        return redirect('/halaman_mitra')->with('success', 'Jenis ' . $jenis->name . ' berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = produk::find($id);
        $produk->delete();

        return redirect('/halaman_mitra')->with('deleted', 'akun telah dihapus!');
    }
}
