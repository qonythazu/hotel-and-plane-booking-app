<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class addUserController extends Controller
{
    //
    public function index(){
        return view('halaman/form_tambah_pengguna');
    }

    public function store(Request $request)
    {
        $datavalid = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required'
        ]);

        $datavalid['password'] = bcrypt($datavalid['password']);

        User::create($datavalid);
        $request->session()->flash('success', 'Data Berhasil Ditambahkan!');
        return redirect('/tabel_pengguna');
    }
}
