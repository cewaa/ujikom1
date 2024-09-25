<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, redirect ke dashboard
            return redirect()->route('dashboard.index');
        }

        // Jika autentikasi gagal, kembalikan ke halaman login dengan pesan error
        return redirect()->route('user.login')->withErrors(['loginError' => 'Email atau password salah!']);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Menghapus session user

        // Mengalihkan pengguna ke halaman home setelah logout
        return redirect('/login'); // atau ke route lain yang diinginkan
    }
}
