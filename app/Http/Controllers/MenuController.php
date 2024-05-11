<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
{
    $menus = Menu::all(); // Mengambil semua data menu

    // Debug isi dari $menus
    if (empty($menus)) {
        // Lakukan penanganan jika $menus kosong
    }

    return view('menu.index', compact('menus'));
}

}
