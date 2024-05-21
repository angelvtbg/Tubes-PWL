<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi login dan autentikasi pengguna
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Ambil id pengguna yang berhasil login
            $idPelanggan = Auth::user()->id;
            
            // Simpan idPelanggan ke dalam session
            Session::put('idPelanggan', $idPelanggan);

            // Redirect ke halaman tujuan
            return redirect()->intended('dashboard');
        }

        // Jika login gagal
        return redirect()->back()->with('error', 'Email atau password salah');
    }
}
