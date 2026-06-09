@extends('layouts.app')

@section('title', 'Edit Penulis')
@section('page-title', 'Edit Penulis')

@section('content')
    <div class="card" style="max-width: 600px;">
        <div class="card-header">
            <i class="bi bi-pencil-fill text-warning me-2"></i>Form Edit Penulis
        </div>
        <div class="card-body p-4">
            <form action="{{ route('penulis.update', $penulis) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap', $penulis->nama_lengkap) }}" required>
                    @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $penulis->email) }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Kosongkan jika tidak ingin mengubah">
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Foto Profil</label>
                    @if($penulis->foto)
                        <div class="mb-2">
                            <img src="{{ asset('storage/foto/' . $penulis->foto) }}" alt="" style="width:60px; height:60px; border-radius:50%; object-fit:cover;">
                            <small class="text-muted d-block mt-1">Foto saat ini.</small>
                        </div>
                    @endif
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                    @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="bi bi-check-lg me-1"></i> Perbarui</button>
                    <a href="{{ route('penulis.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
