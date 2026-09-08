@extends('layouts.app')

@section('title', 'Laporan Panen - SIM Budidaya Nila Salin')

@section('content')
@php
    $dataPanen = $panen ?? collect();
    $totalData = count($dataPanen);
@endphp

<div class="row">
    <div class="col-12">
        <h5 class="text-light"><i class="fas fa-harvest text-cyan"></i> Laporan Panen</h5>
        <p class="text-secondary">Rekapitulasi data panen ikan nila salin</p>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fas fa-table text-cyan me-2"></i> Data Panen
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal Panen</th>
                        <th>Kolam</th>
                        <th>Pembudidaya</th>
                        <th>Berat (kg)</th>
                        <th>Harga/kg</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                        $items = $dataPanen;
                    @endphp

                    @if(count($items) > 0)
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ isset($item->tanggal_panen) ? \Carbon\Carbon::parse($item->tanggal_panen)->format('d/m/Y') : '-' }}</td>
                            <td>{{ $item->kolam->nama_kolam ?? '-' }}</td>
                            <td>{{ $item->kolam->pembudidaya->nama ?? '-' }}</td>
                            <td>{{ number_format($item->berat_panen ?? 0, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->harga_per_kg ?? 0, 0, ',', '.') }}</td>
                            <td>
                                @php $status = $item->status ?? 'habis'; @endphp
                                @if($status == 'tersedia')
                                    <span class="badge bg-success">Tersedia</span>
                                @elseif($status == 'terjual')
                                    <span class="badge bg-warning text-dark">Terjual</span>
                                @else
                                    <span class="badge bg-secondary">Habis</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center text-secondary py-4">
                                <i class="fas fa-harvest fa-2x d-block mb-2" style="color:#475569;"></i>
                                Belum ada data panen
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