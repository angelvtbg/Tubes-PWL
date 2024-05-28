<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class ThumbnailController extends Controller
{
    public function index()
    {
        $thumbnail = Menu::all();
        return view('menu.thumbnail', compact('thumbnail'));
    }
}
