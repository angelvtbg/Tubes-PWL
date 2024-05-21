<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $categories = Kategori::all();
        return view('dashboard.kategori.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:kategoris|max:255',
        ]);

        Kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(Kategori $kategori)
    {
        return view('dashboard.kategori.edit', compact('kategori'));
    }

    public function delete($id)
    {
        $category = Kategori::findOrFail($id);
        $category->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        
        $kategori->update($request->all());
        
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
