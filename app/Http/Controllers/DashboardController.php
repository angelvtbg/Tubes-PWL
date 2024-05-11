<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahAdmin = User::where('role', 'admin')->count();
        $jumlahPengguna = User::where('role', 'user')->count();
        $jumlahMenu = Menu::count();

        return view('dashboard', compact('jumlahAdmin', 'jumlahPengguna', 'jumlahMenu'));
    }
}
