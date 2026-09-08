@extends('layouts.app')

@section('title', 'Detail Pakan - SIM Budidaya Nila Salin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-box text-cyan me-2"></i> Detail Pakan
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td style="width:150px; color:#94a3b8;">Nama Pakan</td>
                        <td><strong>{{ $pakan->nama_pakan }}</strong></td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Stok</td>
                        <td>{{ number_format($pakan->stok, 0, ',', '.') }} {{ $pakan->satuan }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Satuan</td>
                        <td>{{ $pakan->satuan }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Harga</td>
                        <td>Rp {{ number_format($pakan->harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Dibuat</td>
                        <td>{{ $pakan->created_at->format('d F Y H:i') }}</td>
                    </tr>
                </table>

                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('pakan.edit', $pakan->id) }}" class="btn btn-cyan">
                        <i class="fas fa-edit me-2"></i> Edit
                    </a>
                    <a href="{{ route('pakan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection