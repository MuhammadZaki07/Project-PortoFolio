<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    public function login(){
        return view('Auth.login');
    }

    public function processLogin(Request $request){
        if($request->method() == 'POST'){
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $credentials = $request->only(['email','password']);
            $remember = $request->has('remember');

            if (Auth::attempt($credentials,$remember)) {
                return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
            } else {
                return redirect()->route('login.index')->with('error', 'Login gagal, cek kembali email dan password Anda.');
            }
        }
    }

    public function logout(){
        Auth::logout();
       return redirect()->route('index')->with('success','Log-out Success!!');
    }
}
