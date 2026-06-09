<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Penulis;
use App\Models\KategoriArtikel;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArtikel = Artikel::count();
        $totalPenulis = Penulis::count();
        $totalKategori = KategoriArtikel::count();
        $artikelTerbaru = Artikel::with('penulis', 'kategori')->orderBy('id', 'desc')->take(5)->get();

        return view('dashboard', compact('totalArtikel', 'totalPenulis', 'totalKategori', 'artikelTerbaru'));
    }
}
