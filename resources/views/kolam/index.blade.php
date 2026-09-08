@extends('layouts.app')

@section('title', 'Data Kolam - SIM Budidaya Nila Salin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="text-light"><i class="fas fa-water text-cyan"></i> Data Kolam</h5>
    <a href="{{ route('kolam.create') }}" class="btn btn-cyan">
        <i class="fas fa-plus me-2"></i> Tambah Kolam
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kolam</th>
                        <th>Pembudidaya</th>
                        <th>Luas</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kolam as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $item->nama_kolam }}</strong></td>
                        <td>{{ $item->pembudidaya->nama ?? '-' }}</td>
                        <td>{{ number_format($item->luas, 0, ',', '.') }} m²</td>
                        <td>{{ Str::limit($item->lokasi, 20) ?? '-' }}</td>
                        <td>
                            @if($item->status == 'aktif')
                                <span class="badge bg-success">Aktif</span>
                            @elseif($item->status == 'nonaktif')
                                <span class="badge bg-danger">Nonaktif</span>
                            @else
                                <span class="badge bg-secondary">Kosong</span>
                            @endif
                        </td>
                        <td style="text-align:center;">
                            <!-- TOMBOL SHOW -->
                            <a href="{{ route('kolam.show', $item->id) }}" class="btn btn-outline-cyan btn-sm" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('kolam.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('kolam.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-secondary py-4">
                            <i class="fas fa-water fa-2x d-block mb-2" style="color:#475569;"></i>
                            Belum ada data kolam
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent border-top border-secondary">
        <div class="d-flex justify-content-between align-items-center">
            <span class="text-secondary" style="font-size:13px;">
                Menampilkan {{ $kolam->firstItem() ?? 0 }} - {{ $kolam->lastItem() ?? 0 }} dari {{ $kolam->total() }} data
            </span>
            {{ $kolam->links() }}
        </div>
    </div>
</div>
@endsection