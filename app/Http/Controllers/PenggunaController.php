<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        // Tambahkan logika untuk mengambil data pengguna dari database
        $pengguna = \App\Models\User::all();

        return view('dashboard.pengguna.index', compact('pengguna'));
    }
}
