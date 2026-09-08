@extends('layouts.app')

@section('title', 'Detail Benih - SIM Budidaya Nila Salin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-seedling text-cyan me-2"></i> Detail Benih
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td style="width:150px; color:#94a3b8;">Kolam</td>
                        <td><strong>{{ $benih->kolam->nama_kolam ?? '-' }}</strong></td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Pembudidaya</td>
                        <td>{{ $benih->kolam->pembudidaya->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Jumlah Benih</td>
                        <td>{{ number_format($benih->jumlah_benih, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Tanggal Tebar</td>
                        <td>{{ \Carbon\Carbon::parse($benih->tanggal_tebar)->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Sumber Benih</td>
                        <td>{{ $benih->sumber_benih ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Keterangan</td>
                        <td>{{ $benih->keterangan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Dibuat</td>
                        <td>{{ $benih->created_at->format('d F Y H:i') }}</td>
                    </tr>
                </table>

                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('benih.edit', $benih->id) }}" class="btn btn-cyan">
                        <i class="fas fa-edit me-2"></i> Edit
                    </a>
                    <a href="{{ route('benih.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection