@extends('layouts.app')

@section('title', 'Tambah Artikel')
@section('page-title', 'Tambah Artikel')

@section('content')
    <div class="card" style="max-width: 800px;">
        <div class="card-header">
            <i class="bi bi-plus-circle-fill text-success me-2"></i>Form Tambah Artikel
        </div>
        <div class="card-body p-4">
            <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Artikel <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" placeholder="Masukkan judul artikel" required>
                    @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                    <select name="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror" required>
                        <option value="">— Pilih Kategori —</option>
                        @foreach($kategori as $kat)
                            <option value="{{ $kat->id }}" {{ old('id_kategori') == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('id_kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Gambar Artikel</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Isi Artikel <span class="text-danger">*</span></label>
                    <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" rows="8" placeholder="Tulis isi artikel..." required>{{ old('isi') }}</textarea>
                    @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                    <a href="{{ route('artikel.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
