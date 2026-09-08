@extends('layouts.app')

@section('title', 'Pemberian Pakan - SIM Budidaya Nila Salin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="text-light"><i class="fas fa-clock text-cyan"></i> Pemberian Pakan</h5>
    <a href="{{ route('pemberian-pakan.create') }}" class="btn btn-cyan">
        <i class="fas fa-plus me-2"></i> Tambah Pemberian Pakan
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
                        <th>Pakan</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pemberianPakan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kolam->nama_kolam ?? '-' }}</td>
                        <td>{{ $item->pakan->nama_pakan ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                        <td>{{ number_format($item->jumlah, 0, ',', '.') }} {{ $item->pakan->satuan ?? 'kg' }}</td>
                        <td style="text-align:center;">
                            <a href="{{ route('pemberian-pakan.show', $item->id) }}" class="btn btn-outline-cyan btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('pemberian-pakan.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('pemberian-pakan.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-secondary py-4">
                            <i class="fas fa-clock fa-2x d-block mb-2" style="color:#475569;"></i>
                            Belum ada data pemberian pakan
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
                Menampilkan {{ $pemberianPakan->firstItem() ?? 0 }} - {{ $pemberianPakan->lastItem() ?? 0 }} dari {{ $pemberianPakan->total() }} data
            </span>
            {{ $pemberianPakan->links() }}
        </div>
    </div>
</div>
@endsection