<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){

        $users = User::paginate(10);
        return response()->json([
            'data' => $users
        ]);
        return view('halaman/admin/form_tambah_pengguna');

    }

    public function store(Request $request)
    {

        // $datavalid = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|email:dns|unique:users',
        //     'password' => 'required'
        // ]);

        // $datavalid['password'] = bcrypt($datavalid['password']);
        // // $datavalid['role'] = 

        // User::create($datavalid);
        // $request->session()->flash('success', 'Data berhasil ditambahkan!');
        // // return redirect('/tabel_pengguna');
        // return response()->json([
        //     'data' => $datavalid
        // ]);

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json([
            'data' => $users
        ]);
    }

    public function show(User $users){
        return response()->json([
            'data' => $users
        ]);
    }

    public function update(Request $request, User $users){
        // $datavalid = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|email:dns|unique:users',
        //     'password' => 'required'
        // ]);

        // $datavalid['password'] = bcrypt($datavalid['password']);
        // // $datavalid['role'] = 

        // User::save($datavalid);
        // $request->session()->flash('success', 'Data berhasil diubah!');
        // return redirect('/tabel_pengguna');
        // return response()->json([
        //     'data' => $users
        // ]);

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->save();

        return response()->json([
            'data' => $users
        ]);
    }

    public function destroy(User $users){
        $users->delete();
        return response()->json([
            'message' => 'user deleted'
        ], 204);
    }
}