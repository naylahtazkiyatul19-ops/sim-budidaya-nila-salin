@extends('layouts.app')

@section('title', 'Detail Pemberian Pakan - SIM Budidaya Nila Salin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-clock text-cyan me-2"></i> Detail Pemberian Pakan
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td style="width:150px; color:#94a3b8;">Kolam</td>
                        <td><strong>{{ $pemberianPakan->kolam->nama_kolam ?? '-' }}</strong></td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Pembudidaya</td>
                        <td>{{ $pemberianPakan->kolam->pembudidaya->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Pakan</td>
                        <td><strong>{{ $pemberianPakan->pakan->nama_pakan ?? '-' }}</strong></td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Tanggal</td>
                        <td>{{ \Carbon\Carbon::parse($pemberianPakan->tanggal)->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Jumlah</td>
                        <td><span class="text-cyan">{{ number_format($pemberianPakan->jumlah, 0, ',', '.') }} {{ $pemberianPakan->pakan->satuan ?? 'kg' }}</span></td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Keterangan</td>
                        <td>{{ $pemberianPakan->keterangan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Dibuat</td>
                        <td>{{ $pemberianPakan->created_at->format('d F Y H:i') }}</td>
                    </tr>
                </table>

                <div class="mt-3 p-3" style="background: rgba(0,212,255,0.05); border-radius: 10px; border: 1px solid rgba(0,212,255,0.1);">
                    <p class="text-secondary" style="font-size:14px;">
                        <i class="fas fa-box text-cyan me-2"></i>
                        Stok pakan <strong>{{ $pemberianPakan->pakan->nama_pakan ?? '-' }}</strong> saat ini: 
                        <span class="text-cyan fw-bold">{{ number_format($pemberianPakan->pakan->stok ?? 0, 0, ',', '.') }} {{ $pemberianPakan->pakan->satuan ?? 'kg' }}</span>
                    </p>
                </div>

                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('pemberian-pakan.edit', $pemberianPakan->id) }}" class="btn btn-cyan">
                        <i class="fas fa-edit me-2"></i> Edit
                    </a>
                    <a href="{{ route('pemberian-pakan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection