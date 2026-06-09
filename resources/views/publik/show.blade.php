@extends('layouts.publik')

@section('title', $artikel->judul)
@section('meta-description', Str::limit(strip_tags($artikel->isi), 160))

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Kolom Kiri: Detail Artikel -->
                <div class="col-lg-8">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="breadcrumb-custom">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('publik.index') }}"><i class="bi bi-house-fill me-1"></i>Beranda</a></li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('publik.index', ['kategori' => $artikel->kategori->id ?? '']) }}">{{ $artikel->kategori->nama_kategori ?? '-' }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($artikel->judul, 40) }}</li>
                        </ol>
                    </nav>

                    <!-- Gambar Artikel -->
                    @if($artikel->gambar)
                        <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="detail-header-img">
                    @else
                        <div class="d-flex align-items-center justify-content-center" style="height: 300px; background: linear-gradient(135deg, #e8f5e9, #c8e6c9); border-radius: var(--radius-lg); margin-bottom: 1.5rem;">
                            <i class="bi bi-image" style="font-size: 4rem; color: #81c784;"></i>
                        </div>
                    @endif

                    <!-- Kategori Badge -->
                    <div class="category-badge mb-3">
                        <span class="badge">{{ $artikel->kategori->nama_kategori ?? '-' }}</span>
                    </div>

                    <!-- Judul -->
                    <h1 class="detail-title">{{ $artikel->judul }}</h1>

                    <!-- Meta Penulis -->
                    <div class="detail-meta">
                        @if($artikel->penulis && $artikel->penulis->foto)
                            <img src="{{ asset('storage/foto/' . $artikel->penulis->foto) }}" alt="{{ $artikel->penulis->nama_lengkap }}" class="author-avatar">
                        @else
                            <div class="author-avatar-placeholder">
                                {{ substr($artikel->penulis->nama_lengkap ?? 'A', 0, 1) }}
                            </div>
                        @endif
                        <div>
                            <strong style="color: var(--text-primary);">{{ $artikel->penulis->nama_lengkap ?? 'Anonim' }}</strong>
                            <div style="font-size: 0.85rem; color: var(--text-secondary);">
                                <i class="bi bi-calendar3 me-1"></i>{{ $artikel->hari_tanggal }}
                            </div>
                        </div>
                    </div>

                    <!-- Isi Artikel -->
                    <div class="detail-content">
                        {!! nl2br(e($artikel->isi)) !!}
                    </div>

                    <!-- Tombol Kembali -->
                    <div class="mt-4 pt-3" style="border-top: 1px solid var(--border-color);">
                        <a href="{{ route('publik.index') }}" class="btn-read-more">
                            <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                        </a>
                    </div>
                </div>

                <!-- Kolom Kanan: Sidebar Artikel Terkait -->
                <div class="col-lg-4">
                    <div class="sidebar-widget">
                        <h4 class="widget-title">
                            <i class="bi bi-link-45deg"></i> Artikel Terkait
                        </h4>

                        @if($artikelTerkait->count() > 0)
                            @foreach($artikelTerkait as $related)
                                <a href="{{ route('publik.show', $related->id) }}" class="related-article">
                                    @if($related->gambar)
                                        <img src="{{ asset('storage/gambar/' . $related->gambar) }}" alt="{{ $related->judul }}" class="thumbnail">
                                    @else
                                        <div class="thumbnail d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
                                            <i class="bi bi-image" style="color: #81c784;"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="related-title">{{ $related->judul }}</div>
                                        <div class="related-date">
                                            <i class="bi bi-calendar3 me-1"></i>{{ $related->hari_tanggal ?? $related->created_at->format('d M Y') }}
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <div class="text-center py-3">
                                <i class="bi bi-journal-x d-block mb-2" style="font-size: 2rem; color: #d1d5db;"></i>
                                <p class="text-muted mb-0" style="font-size: 0.9rem;">Belum ada artikel terkait.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
