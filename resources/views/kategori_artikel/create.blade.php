@extends('layouts.app')

@section('title', 'Tambah Kategori')
@section('page-title', 'Tambah Kategori')

@section('content')
    <div class="card" style="max-width: 500px;">
        <div class="card-header">
            <i class="bi bi-plus-circle-fill text-success me-2"></i>Form Tambah Kategori
        </div>
        <div class="card-body p-4">
            <form action="{{ route('kategori_artikel.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label fw-semibold">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{ old('nama_kategori') }}" placeholder="Masukkan nama kategori" required>
                    @error('nama_kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                    <a href="{{ route('kategori_artikel.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
