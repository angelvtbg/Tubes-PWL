<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\ChefProfile;
use App\Models\Users;
use App\Http\Controllers\ChefProfileController;


class Chef_ProfileController extends Controller
{
    public function index()
    {
        // Ambil semua data profil chef dari database
        $chefProfile = auth()->user()->chef_Profile;

        // Tampilkan halaman indeks dengan data profil chef
        return view('ChefProfile.index')->with('chefProfile', $chefProfile);
    }

    public function update(Request $request, ChefProfile $chefProfile)
    {
        $data = $request->validate([
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'cover_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string',
            'skills' => 'nullable|string',
            'bio' => 'nullable|string',
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile_picture_path = $request->file('profile_picture')->store('chef_profiles', 'public');
            $data['profile_picture'] = $profile_picture_path;
        }

        if ($request->hasFile('cover_photo')) {
            $cover_photo_path = $request->file('cover_photo')->store('chef_profiles', 'public');
            $data['cover_photo'] = $cover_photo_path;
        }

        $chefProfile->update($data);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function showProfile()
{
    $chefProfile = auth()->user()->chefProfile;

    if ($chefProfile) {
        // Tampilkan profil koki
        return view('profile.show', ['chefProfile' => $chefProfile]);
    } else {
        // Redirect atau tampilkan pesan bahwa profil koki tidak ditemukan
        return redirect()->route('home')->with('error', 'Profil koki tidak ditemukan.');
    }
}

public function editProfile()
{
    $chefProfile = auth()->user()->chefProfile;

    if ($chefProfile) {
        // Tampilkan formulir edit profil koki
        return view('profile.edit', ['chefProfile' => $chefProfile]);
    } else {
        // Redirect atau tampilkan pesan bahwa profil koki tidak ditemukan
        return redirect()->route('home')->with('error', 'Profil koki tidak ditemukan.');
    }
}

}
