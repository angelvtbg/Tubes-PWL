<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    protected function authenticated(Request $request, $user)
    {
        // Simpan idPelanggan ke dalam session
        $idPelanggan = Auth::id();
        $request->session()->put('idPelanggan', $idPelanggan);

        return redirect()->intended($this->redirectPath());
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
