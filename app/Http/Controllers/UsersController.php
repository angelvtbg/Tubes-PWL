<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan Anda sudah memiliki model User

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data pengguna
        return view('users.index', compact('users')); // Mengembalikan ke view dengan data users
    }
}
