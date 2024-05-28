<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class NewsController extends Controller
{
    public function index()
    {
        $menus = Menu::all(); // Ambil semua data dari tabel menus
        return view('konten', compact('menus')); // Kirim data ke view berita.blade.php
    }
}
