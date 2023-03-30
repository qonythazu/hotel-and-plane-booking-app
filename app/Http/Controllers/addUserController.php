<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\role;

class addUserController extends Controller
{
    //
    public function index(){
        return view('halaman/admin/form_tambah_pengguna', [
            "roles" => role::all()
        ]);
    }

    public function store(Request $request)
    {
        $datavalid = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        $datavalid['password'] = bcrypt($datavalid['password']);

        // return request()->all();
        User::create($datavalid);
        $request->session()->flash('success', 'Data Berhasil Ditambahkan!');
        return redirect('/tabel_pengguna');
    }
}
