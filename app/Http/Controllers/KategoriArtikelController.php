<?php

namespace App\Http\Controllers;

use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class KategoriArtikelController extends Controller
{
    public function index()
    {
        $kategori = KategoriArtikel::withCount('artikel')->orderBy('id', 'desc')->get();
        return view('kategori_artikel.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori_artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        KategoriArtikel::create($request->only('nama_kategori'));

        return redirect()->route('kategori_artikel.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(KategoriArtikel $kategoriArtikel)
    {
        return view('kategori_artikel.edit', ['kategori' => $kategoriArtikel]);
    }

    public function update(Request $request, KategoriArtikel $kategoriArtikel)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategoriArtikel->update($request->only('nama_kategori'));

        return redirect()->route('kategori_artikel.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy(KategoriArtikel $kategoriArtikel)
    {
        $kategoriArtikel->delete();

        return redirect()->route('kategori_artikel.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
