<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class register extends Controller
{
    public function showRegister(){
        return view('Auth.register');
    }

    public function processRegister(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'max:50', 'string'],
            'username' => ['required', 'max:50', 'string', 'unique:users'],
            'email' => ['email', 'unique:users', 'max:255', 'required'],
            'password' => ['string', 'min:8', 'required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->input('nama'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($user) {
            return redirect()->route('login.index')->with('success', 'Registrasi berhasil!');
        } else {
            return redirect()->route('register.index')->with('error', 'Registrasi gagal!');
        }
    }
}
