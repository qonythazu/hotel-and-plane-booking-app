<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index(){
        return view('sesi/index');
    }

    function login(Request $request){
        $request->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
        ], [
            'email.required'=>'Email Wajib Diisi!',
            'password.required'=>'Password Wajib Diisi!'
        ]
        );
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)){
            
            if (auth()->user()->role_id == 1) {
                return redirect('dashboard_admin')->with('success', 'Berhasil Login');
            } elseif (auth()->user()->role_id == 2) {
                return redirect('halaman_mitra')->with('success', 'Berhasil Login');
            } elseif (auth()->user()->role_id == 3){
                return redirect('pengguna_book_hotel')->with('success', 'Berhasil Login');
            }

        } else {
            return back()->with('loginError','Email atau Password tidak valid');
        }
    }

    function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/')->with('success', 'Berhasil Logout');
    }
}
