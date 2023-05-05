<?php

namespace App\Http\Controllers;

use App\Models\role;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){
        return view('halaman/admin/form_tambah_pengguna',[
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

        $users = User::create($datavalid);
        // return response()->json([
        //     'message' => 'User created successfully',
        //     'user' => $users
        // ], 201);
        return redirect('/pengaturan_akun')->with('success', 'akun berhasil ditambahkan!');
    }

    public function show($id)
    {
        $users = User::find($id);

        if (!$users) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        return response()->json([
            'data' => $users
        ], 200);
    }

    public function update(Request $request, User $user)
    {
        $datavalid = $request->validate([
            'name' => 'max:255',
            'email' => 'email:dns|unique:users,email,'.$user->id,
            'password' => 'sometimes'
        ]);

        if (isset($datavalid['password'])) {
            $datavalid['password'] = bcrypt($datavalid['password']);
        }

        $user->name = $datavalid['name'];
        $user->email = $datavalid['email'];
        $user->password = $datavalid['password'];

        $user->save();

        return response()->json([
            'data' => $user
        ]);
    }

    public function destroy(User $users,$id){
        $users=User::find($id);

        $users->delete();

        return response()->json([
            'message' => 'user deleted'
        ]);
    }
}
