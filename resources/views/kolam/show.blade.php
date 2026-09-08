@extends('layouts.app')

@section('title', 'Detail Kolam - SIM Budidaya Nila Salin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-water text-cyan me-2"></i> Detail Kolam
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td style="width:150px; color:#94a3b8;">Nama Kolam</td>
                        <td><strong>{{ $kolam->nama_kolam }}</strong></td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Pembudidaya</td>
                        <td>{{ $kolam->pembudidaya->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Luas</td>
                        <td>{{ number_format($kolam->luas, 0, ',', '.') }} m²</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Lokasi</td>
                        <td>{{ $kolam->lokasi ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Status</td>
                        <td>
                            @if($kolam->status == 'aktif')
                                <span class="badge bg-success">Aktif</span>
                            @elseif($kolam->status == 'nonaktif')
                                <span class="badge bg-danger">Nonaktif</span>
                            @else
                                <span class="badge bg-secondary">Kosong</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Dibuat</td>
                        <td>{{ $kolam->created_at->format('d F Y H:i') }}</td>
                    </tr>
                </table>

                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('kolam.edit', $kolam->id) }}" class="btn btn-cyan">
                        <i class="fas fa-edit me-2"></i> Edit
                    </a>
                    <a href="{{ route('kolam.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection