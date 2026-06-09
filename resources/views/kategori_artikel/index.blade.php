@extends('layouts.app')

@section('title', 'Kelola Kategori')
@section('page-title', 'Kelola Kategori Artikel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0" style="font-weight: 700;"><i class="bi bi-bookmark-fill text-success me-2"></i>Daftar Kategori</h5>
        <a href="{{ route('kategori_artikel.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-plus-lg me-1"></i> Tambah Kategori
        </a>
    </div>

    <div class="card" style="max-width: 700px;">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4" width="8%">No</th>
                        <th>Nama Kategori</th>
                        <th>Jumlah Artikel</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategori as $key => $item)
                        <tr>
                            <td class="ps-4">{{ $key + 1 }}</td>
                            <td><strong>{{ $item->nama_kategori }}</strong></td>
                            <td><span class="badge badge-success rounded-pill">{{ $item->artikel_count }} artikel</span></td>
                            <td class="text-center">
                                <a href="{{ route('kategori_artikel.edit', $item) }}" class="btn btn-sm btn-outline-warning rounded-pill me-1" title="Edit"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('kategori_artikel.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" title="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">Belum ada kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
