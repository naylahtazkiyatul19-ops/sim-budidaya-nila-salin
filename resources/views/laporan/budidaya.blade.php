@extends('layouts.app')

@section('title', 'Laporan Budidaya - SIM Budidaya Nila Salin')

@section('content')
@php
    $dataPembudidaya = $pembudidaya ?? collect();
    $totalData = count($dataPembudidaya);
@endphp

<div class="row">
    <div class="col-12">
        <h5 class="text-light"><i class="fas fa-file-alt text-cyan"></i> Laporan Budidaya</h5>
        <p class="text-secondary">Rekapitulasi data budidaya ikan nila salin</p>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fas fa-table text-cyan me-2"></i> Data Budidaya
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pembudidaya</th>
                        <th>UMKM</th>
                        <th>Jumlah Kolam</th>
                        <th>Total Benih</th>
                        <th>Total Panen (kg)</th>
                        <th>Total Penjualan</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse($dataPembudidaya as $item)
                    @php
                        $totalBenih = 0;
                        $totalPanen = 0;
                        $totalPenjualan = 0;
                        
                        foreach($item->kolams as $kolam) {
                            $totalBenih += $kolam->benihs->sum('jumlah_benih');
                            $totalPanen += $kolam->panens->sum('berat_panen');
                            
                            foreach($kolam->panens as $panen) {
                                $totalPenjualan += $panen->penjualans->sum('total_harga');
                            }
                        }
                    @endphp
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><strong>{{ $item->nama }}</strong></td>
                        <td>{{ $item->nama_umkm ?? '-' }}</td>
                        <td>{{ $item->kolams->count() }}</td>
                        <td>{{ number_format($totalBenih, 0, ',', '.') }}</td>
                        <td>{{ number_format($totalPanen, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-secondary py-4">
                            <i class="fas fa-file fa-2x d-block mb-2" style="color:#475569;"></i>
                            Belum ada data
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
                Total data: {{ $totalData }}
            </span>
            <button type="button" class="btn btn-cyan btn-sm" onclick="window.print()">
                <i class="fas fa-print me-2"></i> Cetak
            </button>
        </div>
    </div>
</div>
@endsection