@extends('layouts.app')

@section('title', 'Data Pakan - SIM Budidaya Nila Salin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="text-light"><i class="fas fa-box text-cyan"></i> Data Pakan</h5>
    <a href="{{ route('pakan.create') }}" class="btn btn-cyan">
        <i class="fas fa-plus me-2"></i> Tambah Pakan
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
                        <th>Nama Pakan</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pakan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $item->nama_pakan }}</strong></td>
                        <td>{{ number_format($item->stok, 0, ',', '.') }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td style="text-align:center;">
                            <a href="{{ route('pakan.show', $item->id) }}" class="btn btn-outline-cyan btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('pakan.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('pakan.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center text-secondary py-4">Belum ada data pakan</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent border-top border-secondary">
        {{ $pakan->links() }}
    </div>
</div>
@endsection