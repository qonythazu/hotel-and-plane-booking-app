<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class addMitraController extends Controller
{
    //
    public function index(){
        return view('halaman/admin/form_tambah_mitra');
    }

    public function store(Request $request)
    {
        // return request()->all();
        $datavalid = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required'
        ]);

        $datavalid['password'] = bcrypt($datavalid['password']);
        // $datavalid['role'] = 

        User::create($datavalid);
        $request->session()->flash('success', 'Data Berhasil Ditambahkan!');
        return redirect('/tabel_mitra');
    }
}
