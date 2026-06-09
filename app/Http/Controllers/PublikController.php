<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class PublikController extends Controller
{
    public function index(Request $request)
    {
        $kategoriAktif = $request->query('kategori');

        $query = Artikel::with('penulis', 'kategori')
            ->orderBy('id', 'desc');

        if ($kategoriAktif) {
            $query->where('id_kategori', $kategoriAktif);
        }

        $artikel = $query->take(5)->get();

        $semuaKategori = KategoriArtikel::withCount('artikel')
            ->orderBy('nama_kategori', 'asc')
            ->get();

        $totalArtikel = Artikel::count();

        return view('publik.index', compact('artikel', 'semuaKategori', 'kategoriAktif', 'totalArtikel'));
    }

    public function show($id)
    {
        $artikel = Artikel::with('penulis', 'kategori')->findOrFail($id);

        $artikelTerkait = Artikel::with('penulis')
            ->where('id_kategori', $artikel->id_kategori)
            ->where('id', '!=', $artikel->id)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('publik.show', compact('artikel', 'artikelTerkait'));
    }
}
