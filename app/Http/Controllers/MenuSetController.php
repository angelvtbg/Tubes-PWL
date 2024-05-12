<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuSetController extends Controller
{
    public function index()
    {
        $menuset = Menu::all(); // Mengambil semua data menu

        // Debug isi dari $menus
        if (empty($menuset)) {
            // Lakukan penanganan jika $menus kosong
        }

        // Lakukan operasi yang diperlukan untuk menampilkan halaman pengelola berita
        return view('dashboard.menuset.index', compact('menuset'));
    }
}
