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
        $produk = produk::with('jenis', 'user')->get();
        return view('halaman/mitra/tambah_produk',[
            'produk' => $produk,
            'acc' => User::all()
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
        $datavalid = $request->validate([
            'nama_produk' => 'required|max:255',
            'jenis_id' => 'required',
            'user_id' => 'required',
            'deskripsi' => 'required'
        ]);

        // dd($datavalid);

        produk::create($datavalid);

        if(auth()->user()->role_id == 1){
            return redirect('/pengaturan_hotel_pesawat')->with('success', 'produk berhasil ditambahkan!');
        } elseif(auth()->user()->role_id == 2){
            return redirect('/halaman_mitra')->with('success', 'produk berhasil ditambahkan!');
        }
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
        $produk = produk::where('id', $id)->firstOrFail();
        return view('halaman/mitra/edit_produk', [
            'produk' => $produk,
            'jenis' => jenis::all(),
            'acc' => User::all()
        ]);


    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $produk = produk::find($id);

        $datavalid = $request->validate([
        'nama_produk' => 'required|max:255',
        'jenis_id' => 'required|numeric',
        'user_id' => 'required|numeric',
        'deskripsi' => 'required'
        ]);


        $produk->nama_produk = $datavalid['nama_produk'];
        $produk->deskripsi = $datavalid['deskripsi'];
        $produk->user_id = $datavalid['user_id'];
        $produk->jenis_id = $datavalid['jenis_id'];

        $produk->save();

        if(auth()->user()->role_id == 1){
            return redirect('/pengaturan_hotel_pesawat')->with('success', 'produk ' . $produk->nama_produk . ' berhasil diperbarui.');
        } elseif(auth()->user()->role_id == 2){
            return redirect('/halaman_mitra')->with('success', 'produk ' . $produk->nama_produk . ' berhasil diperbarui.');
        }

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


        if(auth()->user()->role_id == 1){
            return redirect('/pengaturan_hotel_pesawat')->with('deleted', 'produk telah dihapus!');
        } elseif(auth()->user()->role_id == 2){
            return redirect('/halaman_mitra')->with('deleted', 'produk telah dihapus!');
        }
    }
}
