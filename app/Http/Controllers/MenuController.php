<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
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


public function create()
{
    $categories = Kategori::all();
    return view('dashboard.menuset.create', compact('categories'));
}

public function store(Request $request)
{
    $request->validate([
        'penulis' => 'required',
        'id_kategori' => 'required',
        'nama_menu' => 'required',
        'harga_menu' => 'required',
        'gambar_menu' => 'required|image',
        'berita_menu' => 'required',
        'tanggal_menu' => 'required|date',
        'dilihat' => 'required|integer',
    ]);

    $path = $request->file('gambar_menu')->store('public/images');

    Menu::create([
        'penulis' => $request->penulis,
        'id_kategori' => $request->id_kategori,
        'nama_menu' => $request->nama_menu,
        'harga_menu' => $request->harga_menu,
        'gambar_menu' => $path,
        'berita_menu' => $request->berita_menu,
        'tanggal_menu' => $request->tanggal_menu,
        'dilihat' => $request->dilihat,
    ]);

    return redirect()->route('menuset.index');
}

public function edit($id)
{
    $menu = Menu::findOrFail($id);
    return view('dashboard.menuset.edit', compact('menu'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'penulis' => 'required',
        'id_kategori' => 'required',
        'nama_menu' => 'required',
        'harga_menu' => 'required',
        'gambar_menu' => 'nullable|image',
        'berita_menu' => 'required',
        'tanggal_menu' => 'required|date',
        'dilihat' => 'required|integer',
    ]);

    $menu = Menu::findOrFail($id);

    if ($request->hasFile('gambar_menu')) {
        $path = $request->file('gambar_menu')->store('public/images');
        $menu->gambar_menu = $path;
    }

    $menu->update([
        'penulis' => $request->penulis,
        'id_kategori' => $request->id_kategori,
        'nama_menu' => $request->nama_menu,
        'harga_menu' => $request->harga_menu,
        'berita_menu' => $request->berita_menu,
        'tanggal_menu' => $request->tanggal_menu,
        'dilihat' => $request->dilihat,
    ]);

    return redirect()->route('menuset.index');
}

public function destroy($id)
{
    $menu = Menu::findOrFail($id);
    $menu->delete();

    return redirect()->route('menuset.index');
}


}
