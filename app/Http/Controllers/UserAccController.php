<?php

namespace App\Http\Controllers;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\User;
use App\Models\role;
use Illuminate\Http\Request;

class UserAccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::with('role')->get();
        return view("halaman/admin/pengaturan_akun")->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman/admin/form_tambah_pengguna',[
            "roles" => role::all()
        ]);
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
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        $datavalid['password'] = bcrypt($datavalid['password']);
        $datavalid['slug'] = SlugService::createSlug(User::class, 'slug', $datavalid['name']);
        $users = User::create($datavalid);
        return redirect('/daftar_akun')->with('success', 'akun berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        return view('halaman/admin/form_edit_pengguna',[
            'user' => $user,
            "roles" => role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:255',
            'role_id' => 'required'
        ];

        $user = User::find($id);

        if($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $datavalid = $request->validate($rules);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->slug = SlugService::createSlug(User::class, 'slug', $request->name);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect('/daftar_akun')->with('success', 'User ' . $user->name . ' berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/daftar_akun')->with('deleted', 'akun telah dihapus!');
    }
}
