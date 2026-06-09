<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenulisController extends Controller
{
    public function index()
    {
        $penulis = Penulis::orderBy('id', 'desc')->get();
        return view('penulis.index', compact('penulis'));
    }

    public function create()
    {
        return view('penulis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:penulis,email',
            'password' => 'required|min:6',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['nama_lengkap', 'email']);
        $data['password'] = bcrypt($request->password);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('foto', $namaFoto, 'public');
            $data['foto'] = $namaFoto;
        }

        Penulis::create($data);

        return redirect()->route('penulis.index')->with('success', 'Penulis berhasil ditambahkan!');
    }

    public function edit(Penulis $penulis)
    {
        return view('penulis.edit', compact('penulis'));
    }

    public function update(Request $request, Penulis $penulis)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:penulis,email,' . $penulis->id,
            'password' => 'nullable|min:6',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['nama_lengkap', 'email']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($penulis->foto) {
                Storage::disk('public')->delete('foto/' . $penulis->foto);
            }
            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('foto', $namaFoto, 'public');
            $data['foto'] = $namaFoto;
        }

        $penulis->update($data);

        return redirect()->route('penulis.index')->with('success', 'Penulis berhasil diperbarui!');
    }

    public function destroy(Penulis $penulis)
    {
        if ($penulis->foto) {
            Storage::disk('public')->delete('foto/' . $penulis->foto);
        }
        $penulis->delete();

        return redirect()->route('penulis.index')->with('success', 'Penulis berhasil dihapus!');
    }
}
