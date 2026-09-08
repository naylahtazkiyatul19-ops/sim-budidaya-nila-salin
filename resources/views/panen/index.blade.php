@extends('layouts.app')

@section('title', 'Data Panen - SIM Budidaya Nila Salin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="text-light"><i class="fas fa-fish text-cyan"></i> Data Panen</h5>
    <a href="{{ route('panen.create') }}" class="btn btn-cyan">
        <i class="fas fa-plus me-2"></i> Tambah Panen
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
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
                        <th>Tanggal Panen</th>
                        <th>Berat (kg)</th>
                        <th>Harga/kg</th>
                        <th>Status</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($panen as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kolam->nama_kolam ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_panen)->format('d/m/Y') }}</td>
                        <td>{{ number_format($item->berat_panen, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->harga_per_kg, 0, ',', '.') }}</td>
                        <td>
                            @if($item->status == 'tersedia')
                                <span class="badge bg-success">Tersedia</span>
                            @elseif($item->status == 'terjual')
                                <span class="badge bg-warning text-dark">Terjual</span>
                            @else
                                <span class="badge bg-secondary">Habis</span>
                            @endif
                        </td>
                        <td style="text-align:center;">
                            <a href="{{ route('panen.show', $item->id) }}" class="btn btn-outline-cyan btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('panen.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('panen.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-secondary py-4">
                            <i class="fas fa-fish fa-2x d-block mb-2" style="color:#475569;"></i>
                            Belum ada data panen
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
                Menampilkan {{ $panen->firstItem() ?? 0 }} - {{ $panen->lastItem() ?? 0 }} dari {{ $panen->total() }} data
            </span>
            {{ $panen->links() }}
        </div>
    </div>
</div>
@endsection