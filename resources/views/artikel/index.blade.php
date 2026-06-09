@extends('layouts.app')

@section('title', 'Kelola Artikel')
@section('page-title', 'Kelola Artikel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0" style="font-weight: 700;"><i class="bi bi-file-earmark-text-fill text-success me-2"></i>Daftar Artikel</h5>
        <a href="{{ route('artikel.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-plus-lg me-1"></i> Tambah Artikel
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4" width="5%">No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($artikel as $key => $item)
                        <tr>
                            <td class="ps-4">{{ $key + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="" style="width:50px; height:50px; border-radius:10px; object-fit:cover;">
                                    @else
                                        <div style="width:50px; height:50px; border-radius:10px; background:#e8f5e9;" class="d-flex align-items-center justify-content-center">
                                            <i class="bi bi-image text-success"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <strong>{{ Str::limit($item->judul, 50) }}</strong>
                                        <div class="text-muted" style="font-size:0.78rem;">{{ Str::limit(strip_tags($item->isi), 60) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-success rounded-pill">{{ $item->kategori->nama_kategori ?? '-' }}</span></td>
                            <td>{{ $item->penulis->nama_lengkap ?? '-' }}</td>
                            <td style="font-size:0.85rem; color:#6b7280;">{{ $item->hari_tanggal }}</td>
                            <td class="text-center">
                                <a href="{{ route('artikel.show', $item) }}" class="btn btn-sm btn-outline-info rounded-pill me-1" title="Lihat"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('artikel.edit', $item) }}" class="btn btn-sm btn-outline-warning rounded-pill me-1" title="Edit"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('artikel.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" title="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Belum ada artikel.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
