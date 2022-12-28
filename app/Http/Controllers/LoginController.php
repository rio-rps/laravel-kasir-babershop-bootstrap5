<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $user = Auth::user();
            // if ($user->level == '1') {
            //     return redirect()->intended('beranda');
            // } elseif ($user->level == '2') {
            //     return redirect()->intended('kasir');
            // }
            return redirect()->intended('beranda');
        }

        return view('login.view_login');
    }

    public function proses(Request $r)
    {
        $r->validate(
            [
                'username' => 'required', // dari inputan
                'password' => 'required', // dari inputan
            ],
            [
                'username.required' => 'Username tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
            ],
        );

        $kredensial = $r->only('username', 'password'); // only hanya di gunakan pada user dan password
        if (Auth::attempt($kredensial)) { // attemp di gunakan untuk pengecek an
            $r->session()->regenerate(); // di daftar kan session tiap login
            $user = Auth::user();
            // if ($user->level == '1') {
            //     return redirect()->intended('beranda');
            // } elseif ($user->level == '2') {
            //     return redirect()->intended('kasir');
            // }
            if ($user) {
                return redirect()->intended('beranda');
            }
        }


        return back()->withErrors([
            'keterangan' => "Maaf username / password Anda salah"
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
