<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast\String_;
use Illuminate\Support\Facades\Password;

class login extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function processLogin(Request $request)
    {
        if ($request->method() == 'POST') {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $credentials = $request->only(['email', 'password']);
            $remember = $request->has('remember');

            if (Auth::attempt($credentials, $remember)) {
                return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
            } else {
                return redirect()->route('login.index')->with('error', 'Login gagal, cek kembali email dan password Anda.');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index')->with('success', 'Log-out Success!!');
    }

    public function changePassword(Request $request)
    {
        $request->validate(
            [
                'current_password' => 'required|current_password',
                'password_new' => 'required|min:8|confirmed'
            ],
            [
                'current_password.current_password' => 'password lama salah!!',
                'password_new.confirmed' => 'password tidak sama,cek lagi!!'
            ]
        );

        $user = Auth::user();
        if ($user instanceof User) {
            $user->password = Hash::make($request->password_new);
            $user->save();
            return redirect()->route('Auth.Form_password')->with('success', 'password berhasil diubah!!');
        } else {
            return redirect()->route('Auth.Form_password')->with('error', 'Terjadi kesalahan saat mengubah password. Silakan coba lagi.');
        }
    }

    public function requestPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT ? back()->with(['success' => __($status)]) : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET ? redirect()->route('login.index')->with('success', __($status)) : back()->withErrors(['email' => [__($status)]]);
    }

    public function forgotPassword()
    {
        return view('Auth.forgot_password');
    }

    public function updatePassword(Request $request)
    {
        $token = $request->token;
        $email = $request->email;

        return view('Auth.update_password', compact(['token', 'email']));
    }
}
