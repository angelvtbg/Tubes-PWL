<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;


class HomeController extends Controller
{
    public function index()
{
    $menus = Menu::orderBy('dilihat', 'desc')->take(3)->get(); // Mengambil semua data menu

    // Debug isi dari $menus
    if (empty($menus)) {
        // Lakukan penanganan jika $menus kosong
    }

    $thumbnail = Menu::all();

    return view('home', compact('menus', 'thumbnail'));
}
}