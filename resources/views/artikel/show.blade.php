@extends('layouts.app')

@section('title', 'Detail Artikel')
@section('page-title', 'Detail Artikel')

@section('content')
    <div class="card" style="max-width: 800px;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-eye-fill text-info me-2"></i>Detail Artikel</span>
            <a href="{{ route('artikel.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
        <div class="card-body p-4">
            @if($artikel->gambar)
                <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="img-fluid rounded mb-3" style="max-height: 350px; width:100%; object-fit:cover;">
            @endif

            <span class="badge rounded-pill mb-2" style="background: rgba(25,135,84,0.1); color: #198754; font-weight: 600;">{{ $artikel->kategori->nama_kategori ?? '-' }}</span>

            <h3 class="fw-bold mb-3">{{ $artikel->judul }}</h3>

            <div class="d-flex align-items-center gap-3 mb-4 pb-3" style="border-bottom: 1px solid #e5e7eb;">
                @if($artikel->penulis && $artikel->penulis->foto)
                    <img src="{{ asset('storage/foto/' . $artikel->penulis->foto) }}" alt="" style="width:40px; height:40px; border-radius:50%; object-fit:cover;">
                @else
                    <div style="width:40px; height:40px; border-radius:50%; background: linear-gradient(135deg,#198754,#20c997);" class="d-flex align-items-center justify-content-center text-white fw-bold">
                        {{ substr($artikel->penulis->nama_lengkap ?? 'A', 0, 1) }}
                    </div>
                @endif
                <div>
                    <strong>{{ $artikel->penulis->nama_lengkap ?? 'Anonim' }}</strong>
                    <div class="text-muted" style="font-size:0.85rem;"><i class="bi bi-calendar3 me-1"></i>{{ $artikel->hari_tanggal }}</div>
                </div>
            </div>

            <div style="line-height: 1.8; color: #374151;">
                {!! nl2br(e($artikel->isi)) !!}
            </div>
        </div>
    </div>
@endsection
