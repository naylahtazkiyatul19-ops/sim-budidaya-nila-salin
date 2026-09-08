@extends('layouts.app')

@section('title', 'Laporan Penjualan - SIM Budidaya Nila Salin')

@section('content')
@php
    $dataPenjualan = $penjualan ?? collect();
    $totalData = count($dataPenjualan);
    $grandTotal = $total ?? 0;
@endphp

<div class="row">
    <div class="col-12">
        <h5 class="text-light"><i class="fas fa-money-bill-wave text-cyan"></i> Laporan Penjualan</h5>
        <p class="text-secondary">Rekapitulasi data penjualan ikan nila salin</p>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-table text-cyan me-2"></i> Data Penjualan</span>
        <span class="text-cyan fw-bold">Total: Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Pembudidaya</th>
                        <th>Kolam</th>
                        <th>Jumlah (kg)</th>
                        <th>Harga/kg</th>
                        <th>Total</th>
                        <th>Pembeli</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                        $items = $dataPenjualan;
                    @endphp

                    @if(count($items) > 0)
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ isset($item->tanggal_penjualan) ? \Carbon\Carbon::parse($item->tanggal_penjualan)->format('d/m/Y') : '-' }}</td>
                            <td>{{ $item->pembudidaya->nama ?? '-' }}</td>
                            <td>{{ $item->panen->kolam->nama_kolam ?? '-' }}</td>
                            <td>{{ number_format($item->jumlah_kg ?? 0, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->harga_per_kg ?? 0, 0, ',', '.') }}</td>
                            <td><span class="text-cyan">Rp {{ number_format($item->total_harga ?? 0, 0, ',', '.') }}</span></td>
                            <td>{{ $item->pembeli ?? '-' }}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center text-secondary py-4">
                                <i class="fas fa-money-bill-wave fa-2x d-block mb-2" style="color:#475569;"></i>
                                Belum ada data penjualan
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent border-top border-secondary">
        <div class="d-flex justify-content-between align-items-center">
            <span class="text-secondary" style="font-size:13px;">
                Total data: {{ $totalData }}
            </span>
            <button type="button" class="btn btn-cyan btn-sm" onclick="window.print()">
                <i class="fas fa-print me-2"></i> Cetak
            </button>
        </div>
    </div>
</div>
@endsection