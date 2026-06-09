@extends('layouts.app')

@section('title', 'Kelola Penulis')
@section('page-title', 'Kelola Penulis')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0" style="font-weight: 700;"><i class="bi bi-people-fill text-success me-2"></i>Daftar Penulis</h5>
        <a href="{{ route('penulis.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-plus-lg me-1"></i> Tambah Penulis
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4" width="5%">No</th>
                        <th>Penulis</th>
                        <th>Email</th>
                        <th>Jumlah Artikel</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penulis as $key => $item)
                        <tr>
                            <td class="ps-4">{{ $key + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    @if($item->foto)
                                        <img src="{{ asset('storage/foto/' . $item->foto) }}" alt="" style="width:40px; height:40px; border-radius:50%; object-fit:cover; border: 2px solid rgba(25,135,84,0.2);">
                                    @else
                                        <div style="width:40px; height:40px; border-radius:50%; background: linear-gradient(135deg,#198754,#20c997);" class="d-flex align-items-center justify-content-center text-white fw-bold">
                                            {{ substr($item->nama_lengkap, 0, 1) }}
                                        </div>
                                    @endif
                                    <strong>{{ $item->nama_lengkap }}</strong>
                                </div>
                            </td>
                            <td>{{ $item->email }}</td>
                            <td><span class="badge badge-success rounded-pill">{{ $item->artikel()->count() }} artikel</span></td>
                            <td class="text-center">
                                <a href="{{ route('penulis.edit', $item) }}" class="btn btn-sm btn-outline-warning rounded-pill me-1" title="Edit"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('penulis.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus penulis ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" title="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Belum ada penulis.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
