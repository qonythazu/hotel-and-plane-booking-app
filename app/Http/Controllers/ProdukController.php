<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk; 
use Illuminate\Validation\Rule;

class ProdukController extends Controller
{
    //
    public function index(){

        return view('halaman/admin/form_tambah_hotelpesawat');

    }

    public function store(Request $request)
    {
        $productTypeValues = ['Pesawat', 'Hotel'];

        $datavalid = $request->validate([
            'nama_produk' => 'required|max:255',
            'produk' => ['required', Rule::in($productTypeValues)],
            'user_id' => 'required',
            'deskripsi' => 'required'
        ]);

        $products = produk::create($datavalid);

        return response()->json([
            'message' => 'produk created successfully',
            'produk' => $products
        ], 201);
    }

    public function show($id)
    {
        $products = produk::find($id);

        if (!$products) {
            return response()->json([
                'message' => 'produk not found'
            ], 404);
        }

        return response()->json([
            'data' => $products
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $products=produk::find($id);
        $productTypeValues = ['Pesawat', 'Hotel'];

        $datavalid = $request->validate([
            'nama_produk' => 'max:255',
            'produk' => [Rule::in($productTypeValues)],
            'user_id' => 'required',
            'deskripsi' => 'sometimes'
        ]);

        $products->nama_produk = $datavalid['nama_produk'];
        $products->produk = $datavalid['produk'];
        $products->user_id = $datavalid['user_id'];
        $products->deskripsi = $datavalid['deskripsi'];

        $products->save();

        return response()->json([
            'data' => $products
        ]);
    }

    public function destroy(produk $products, $id){
        $products=produk::find($id);
        $products->delete();
        return response()->json([
            'message' => 'produk deleted'
        ]);
    }  
}
