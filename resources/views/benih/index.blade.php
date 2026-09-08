@extends('layouts.app')

@section('title', 'Data Benih - SIM Budidaya Nila Salin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="text-light"><i class="fas fa-seedling text-cyan"></i> Data Benih</h5>
    <a href="{{ route('benih.create') }}" class="btn btn-cyan">
        <i class="fas fa-plus me-2"></i> Tambah Benih
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
                        <th>Kolam</th>
                        <th>Jumlah Benih</th>
                        <th>Tanggal Tebar</th>
                        <th>Sumber</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($benih as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kolam->nama_kolam ?? '-' }}</td>
                        <td>{{ number_format($item->jumlah_benih, 0, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_tebar)->format('d/m/Y') }}</td>
                        <td>{{ $item->sumber_benih ?? '-' }}</td>
                        <td style="text-align:center;">
                            <a href="{{ route('benih.show', $item->id) }}" class="btn btn-outline-cyan btn-sm" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('benih.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('benih.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-secondary py-4">
                            <i class="fas fa-seedling fa-2x d-block mb-2" style="color:#475569;"></i>
                            Belum ada data benih
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
                Menampilkan {{ $benih->firstItem() ?? 0 }} - {{ $benih->lastItem() ?? 0 }} dari {{ $benih->total() }} data
            </span>
            {{ $benih->links() }}
        </div>
    </div>
</div>
@endsection