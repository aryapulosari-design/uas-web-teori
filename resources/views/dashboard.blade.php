@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <!-- Stat Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="stat-card" style="background: linear-gradient(135deg, #198754, #20c997);">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Total Artikel</div>
                        <div class="stat-number">{{ $totalArtikel }}</div>
                    </div>
                    <i class="bi bi-file-earmark-text-fill stat-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card" style="background: linear-gradient(135deg, #0d6efd, #6ea8fe);">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Total Penulis</div>
                        <div class="stat-number">{{ $totalPenulis }}</div>
                    </div>
                    <i class="bi bi-people-fill stat-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card" style="background: linear-gradient(135deg, #e35d6a, #f0a3ab);">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Total Kategori</div>
                        <div class="stat-number">{{ $totalKategori }}</div>
                    </div>
                    <i class="bi bi-bookmark-fill stat-icon"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Articles -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-clock-history me-2 text-success"></i>Artikel Terbaru</span>
            <a href="{{ route('artikel.index') }}" class="btn btn-sm btn-outline-primary rounded-pill">Lihat Semua</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($artikelTerbaru as $item)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center gap-3">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="" style="width:45px; height:45px; border-radius:8px; object-fit:cover;">
                                    @else
                                        <div style="width:45px; height:45px; border-radius:8px; background:#e8f5e9;" class="d-flex align-items-center justify-content-center">
                                            <i class="bi bi-image text-success"></i>
                                        </div>
                                    @endif
                                    <span style="font-weight: 500;">{{ Str::limit($item->judul, 40) }}</span>
                                </div>
                            </td>
                            <td><span class="badge badge-success rounded-pill">{{ $item->kategori->nama_kategori ?? '-' }}</span></td>
                            <td>{{ $item->penulis->nama_lengkap ?? '-' }}</td>
                            <td style="font-size: 0.85rem; color: #6b7280;">{{ $item->hari_tanggal }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">Belum ada artikel.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
