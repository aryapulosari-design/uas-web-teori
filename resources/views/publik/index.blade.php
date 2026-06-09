@extends('layouts.publik')

@section('title', $kategoriAktif ? 'Kategori — Aplikasi Blog' : 'Beranda')
@section('meta-description', 'Baca artikel terbaru dari berbagai kategori di Aplikasi Blog.')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-badge">
                <i class="bi bi-stars"></i> Blog Terkini
            </div>
            <h1 class="hero-title">Temukan Artikel<br>Menarik & Inspiratif</h1>
            <p class="hero-subtitle">Jelajahi berbagai artikel berkualitas dari penulis terpilih. Baca, pelajari, dan temukan inspirasi baru setiap hari.</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-5" id="artikel">
        <div class="container">
            <div class="row g-4">
                <!-- Kolom Kiri: Daftar Artikel -->
                <div class="col-lg-8">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h2 style="font-size: 1.4rem; font-weight: 700; color: var(--text-primary);">
                            @if($kategoriAktif)
                                <i class="bi bi-funnel-fill text-success me-2"></i>Artikel Terpilih
                            @else
                                <i class="bi bi-newspaper me-2" style="color: var(--primary);"></i>Artikel Terbaru
                            @endif
                        </h2>
                        @if($kategoriAktif)
                            <a href="{{ route('publik.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                                <i class="bi bi-x-lg me-1"></i> Reset Filter
                            </a>
                        @endif
                    </div>

                    @if($artikel->count() > 0)
                        @foreach($artikel as $item)
                            <article class="article-card animate-fadeInUp" style="opacity: 0;">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <div class="card-img-wrapper" style="height: 100%; min-height: 240px;">
                                            @if($item->gambar)
                                                <img src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="{{ $item->judul }}">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center h-100" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
                                                    <i class="bi bi-image" style="font-size: 3rem; color: #81c784;"></i>
                                                </div>
                                            @endif
                                            <div class="category-badge">
                                                <span class="badge">{{ $item->kategori->nama_kategori ?? '-' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body d-flex flex-column h-100">
                                            <h3 class="card-title">{{ $item->judul }}</h3>
                                            <div class="card-meta">
                                                @if($item->penulis && $item->penulis->foto)
                                                    <img src="{{ asset('storage/foto/' . $item->penulis->foto) }}" alt="{{ $item->penulis->nama_lengkap }}" class="author-avatar">
                                                @else
                                                    <div class="author-avatar-placeholder">
                                                        {{ substr($item->penulis->nama_lengkap ?? 'A', 0, 1) }}
                                                    </div>
                                                @endif
                                                <div>
                                                    <strong style="color: var(--text-primary); font-size: 0.85rem;">{{ $item->penulis->nama_lengkap ?? 'Anonim' }}</strong>
                                                    <div style="font-size: 0.78rem; color: #9ca3af;">
                                                        <i class="bi bi-calendar3 me-1"></i>{{ $item->hari_tanggal }}
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="card-text flex-grow-1">{{ Str::limit(strip_tags($item->isi), 150) }}</p>
                                            <div>
                                                <a href="{{ route('publik.show', $item->id) }}" class="btn-read-more">
                                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @else
                        <div class="empty-state">
                            <i class="bi bi-journal-x d-block"></i>
                            <h5>Belum Ada Artikel</h5>
                            <p>Artikel untuk kategori ini belum tersedia. Silakan coba kategori lainnya.</p>
                        </div>
                    @endif
                </div>

                <!-- Kolom Kanan: Sidebar Kategori -->
                <div class="col-lg-4" id="kategori">
                    <div class="sidebar-widget">
                        <h4 class="widget-title">
                            <i class="bi bi-bookmark-star-fill"></i> Kategori Artikel
                        </h4>
                        <ul class="category-list">
                            <li>
                                <a href="{{ route('publik.index') }}" class="{{ !$kategoriAktif ? 'active' : '' }}">
                                    <span><i class="bi bi-grid-fill me-2"></i>Semua Artikel</span>
                                    <span class="count">{{ $totalArtikel }}</span>
                                </a>
                            </li>
                            @foreach($semuaKategori as $kat)
                                <li>
                                    <a href="{{ route('publik.index', ['kategori' => $kat->id]) }}" class="{{ $kategoriAktif == $kat->id ? 'active' : '' }}">
                                        <span><i class="bi bi-tag-fill me-2"></i>{{ $kat->nama_kategori }}</span>
                                        <span class="count">{{ $kat->artikel_count }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
