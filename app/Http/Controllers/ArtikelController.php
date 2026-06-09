<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::with('penulis', 'kategori')->orderBy('id', 'desc')->get();
        return view('artikel.index', compact('artikel'));
    }

    public function create()
    {
        $kategori = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();
        return view('artikel.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori_artikel,id',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['judul', 'id_kategori', 'isi']);
        $data['id_penulis'] = Auth::id();
        $data['hari_tanggal'] = now()->translatedFormat('l, d F Y H:i');

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('gambar', $namaGambar, 'public');
            $data['gambar'] = $namaGambar;
        }

        Artikel::create($data);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function show(Artikel $artikel)
    {
        $artikel->load('penulis', 'kategori');
        return view('artikel.show', compact('artikel'));
    }

    public function edit(Artikel $artikel)
    {
        $kategori = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();
        return view('artikel.edit', compact('artikel', 'kategori'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori_artikel,id',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['judul', 'id_kategori', 'isi']);
        $data['hari_tanggal'] = now()->translatedFormat('l, d F Y H:i');

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($artikel->gambar) {
                Storage::disk('public')->delete('gambar/' . $artikel->gambar);
            }
            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('gambar', $namaGambar, 'public');
            $data['gambar'] = $namaGambar;
        }

        $artikel->update($data);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Artikel $artikel)
    {
        if ($artikel->gambar) {
            Storage::disk('public')->delete('gambar/' . $artikel->gambar);
        }
        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
