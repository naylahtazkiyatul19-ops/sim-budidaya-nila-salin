@extends('layouts.app')

@section('title', 'Detail Penjualan - SIM Budidaya Nila Salin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-money-bill-wave text-cyan me-2"></i> Detail Penjualan
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td style="width:150px; color:#94a3b8;">Pembudidaya</td>
                        <td><strong>{{ $penjualan->pembudidaya->nama ?? '-' }}</strong></td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Panen</td>
                        <td>{{ $penjualan->panen->kolam->nama_kolam ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Tanggal Penjualan</td>
                        <td>{{ \Carbon\Carbon::parse($penjualan->tanggal_penjualan)->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Jumlah</td>
                        <td><span class="text-cyan">{{ number_format($penjualan->jumlah_kg, 0, ',', '.') }} kg</span></td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Harga per kg</td>
                        <td>Rp {{ number_format($penjualan->harga_per_kg, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Total Harga</td>
                        <td><strong class="text-cyan">Rp {{ number_format($penjualan->total_harga, 0, ',', '.') }}</strong></td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Pembeli</td>
                        <td>{{ $penjualan->pembeli ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">No HP Pembeli</td>
                        <td>{{ $penjualan->no_hp_pembeli ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Metode Penjualan</td>
                        <td>
                            @if($penjualan->metode_penjualan == 'langsung_tambak')
                                <span class="badge bg-info">Langsung ke Tambak</span>
                            @else
                                <span class="badge bg-success">Pembeli Datang ke Tambak</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Keterangan</td>
                        <td>{{ $penjualan->keterangan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Dibuat</td>
                        <td>{{ $penjualan->created_at->format('d F Y H:i') }}</td>
                    </tr>
                </table>

                <div class="mt-3 p-3" style="background: rgba(0,212,255,0.05); border-radius: 10px; border: 1px solid rgba(0,212,255,0.1);">
                    <p class="text-secondary" style="font-size:14px;">
                        <i class="fas fa-harvest text-cyan me-2"></i>
                        Sisa stok panen: 
                        <span class="text-cyan fw-bold">{{ number_format($penjualan->panen->berat_panen ?? 0, 0, ',', '.') }} kg</span>
                    </p>
                </div>

                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('penjualan.edit', $penjualan->id) }}" class="btn btn-cyan">
                        <i class="fas fa-edit me-2"></i> Edit
                    </a>
                    <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection