<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;


class HomeController extends Controller
{
    public function index()
{
    $menus = Menu::all(); // Mengambil semua data menu

    // Debug isi dari $menus
    if (empty($menus)) {
        // Lakukan penanganan jika $menus kosong
    }

    return view('home', compact('menus'));
}
}