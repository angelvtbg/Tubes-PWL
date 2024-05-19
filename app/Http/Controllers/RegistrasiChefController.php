<?php

namespace App\Http\Controllers;

use App\Models\ChefProfile;
use Illuminate\Http\Request;
use App\Models\User;

class RegistrasiChefController extends Controller
{
    public function index()
    {
        return view('dashboard.registrasiChef.index');
    }

    public function store(Request $request)
{
    // Validasi data yang dikirim
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'skills' => 'required|string',
        'bio' => 'required|string',
        'user_name' => 'required|string|max:255',  // Tambahkan validasi untuk user_name
        // tambahkan validasi lainnya sesuai kebutuhan
    ]);

    // Cari user berdasarkan nama
    $user = User::where('name', $validatedData['user_name'])->first();

    // Cek apakah user ditemukan
    if (!$user) {
        return redirect()->back()->withErrors(['user_name' => 'Nama pengguna tidak ditemukan.'])->withInput();
    }

    // Buat profil chef baru
    $chefProfile = new ChefProfile();
    $chefProfile->name = $validatedData['name'];
    $chefProfile->skills = $validatedData['skills'];
    $chefProfile->bio = $validatedData['bio'];
    $chefProfile->user_id = $user->id;  // Tambahkan user_id
    // tambahkan atribut lainnya sesuai kebutuhan
    $chefProfile->save();

    return redirect()->route('dashboard')->with('success', 'Chef berhasil diregistrasi!');
}

}
