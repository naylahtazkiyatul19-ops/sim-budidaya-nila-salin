@extends('layouts.app')

@section('title', 'Detail Panen - SIM Budidaya Nila Salin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-fish text-cyan me-2"></i> Detail Panen
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td style="width:150px; color:#94a3b8;">Kolam</td>
                        <td><strong>{{ $panen->kolam->nama_kolam ?? '-' }}</strong></td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Pembudidaya</td>
                        <td>{{ $panen->kolam->pembudidaya->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Tanggal Panen</td>
                        <td>{{ \Carbon\Carbon::parse($panen->tanggal_panen)->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Berat Panen</td>
                        <td><span class="text-cyan">{{ number_format($panen->berat_panen, 0, ',', '.') }} kg</span></td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Harga per kg</td>
                        <td>Rp {{ number_format($panen->harga_per_kg, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Status</td>
                        <td>
                            @if($panen->status == 'tersedia')
                                <span class="badge bg-success">Tersedia</span>
                            @elseif($panen->status == 'terjual')
                                <span class="badge bg-warning text-dark">Terjual</span>
                            @else
                                <span class="badge bg-secondary">Habis</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Keterangan</td>
                        <td>{{ $panen->keterangan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Dibuat</td>
                        <td>{{ $panen->created_at->format('d F Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Total Penjualan</td>
                        <td><span class="text-cyan">Rp {{ number_format($panen->penjualans->sum('total_harga'), 0, ',', '.') }}</span></td>
                    </tr>
                </table>

                @if($panen->penjualans->count() > 0)
                <div class="mt-4">
                    <h6 class="text-cyan"><i class="fas fa-money-bill-wave me-2"></i> Riwayat Penjualan</h6>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jumlah (kg)</th>
                                    <th>Total</th>
                                    <th>Pembeli</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($panen->penjualans as $penjualan)
                                <tr>
                                    <td>{{ $penjualan->tanggal_penjualan }}</td>
                                    <td>{{ number_format($penjualan->jumlah_kg, 0, ',', '.') }}</td>
                                    <td class="text-cyan">Rp {{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                                    <td>{{ $penjualan->pembeli ?? '-' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('panen.edit', $panen->id) }}" class="btn btn-cyan">
                        <i class="fas fa-edit me-2"></i> Edit
                    </a>
                    <a href="{{ route('panen.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection