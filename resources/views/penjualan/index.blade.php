@extends('layouts.app')

@section('title', 'Data Penjualan - SIM Budidaya Nila Salin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="text-light"><i class="fas fa-money-bill-wave text-cyan"></i> Data Penjualan</h5>
    <a href="{{ route('penjualan.create') }}" class="btn btn-cyan">
        <i class="fas fa-plus me-2"></i> Tambah Penjualan
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
                        <th>Pembudidaya</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Pembeli</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penjualan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->pembudidaya->nama ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_penjualan)->format('d/m/Y') }}</td>
                        <td>{{ number_format($item->jumlah_kg, 0, ',', '.') }} kg</td>
                        <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                        <td>{{ $item->pembeli ?? '-' }}</td>
                        <td style="text-align:center;">
                            <a href="{{ route('penjualan.show', $item->id) }}" class="btn btn-outline-cyan btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('penjualan.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('penjualan.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center text-secondary py-4">Belum ada data penjualan</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent border-top border-secondary">
        {{ $penjualan->links() }}
    </div>
</div>
@endsection