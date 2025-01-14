<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller

{
    public function index() {
        return view('index');
    }
    public function authenticate(Request $request){
        //validasi input
        $credentials = $request->validate([
            'email' =>['required','email'],
            'password' => ['required'],
        ]);

        // coba autentikasi
        if (Auth::attempt($credentials)){
            $request->session()->regenerate('/');

            // Redirect ke halaman utama setelah login berhasil
            return redirect()->intended('/');
        }
        // jika login gagal, kembalikan ke halaman login dengan error message
        return back()->withErrors([
          'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/login');
    }
}

