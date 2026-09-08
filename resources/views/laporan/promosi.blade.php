@extends('layouts.app')

@section('title', 'Laporan Promosi - SIM Budidaya Nila Salin')

@section('content')
<div class="row">
    <div class="col-12">
        <h5 class="text-light"><i class="fas fa-file-alt text-cyan"></i> Laporan Promosi</h5>
        <p class="text-secondary">Rekapitulasi data promosi hasil panen</p>
    </div>
</div>

@php
    $promosiData = $promosi ?? collect();
    $totalData = count($promosiData);
@endphp

<div class="card">
    <div class="card-header">
        <i class="fas fa-table text-cyan me-2"></i> Data Promosi
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Pembudidaya</th>
                        <th>Harga/kg</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>WhatsApp</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse($promosiData as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><strong>{{ $item->judul }}</strong></td>
                        <td>{{ $item->pembudidaya->nama ?? '-' }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>{{ number_format($item->stok, 0, ',', '.') }} kg</td>
                        <td>
                            @if($item->status == 'aktif')
                                <span class="badge bg-success">Aktif</span>
                            @elseif($item->status == 'nonaktif')
                                <span class="badge bg-secondary">Nonaktif</span>
                            @else
                                <span class="badge bg-danger">Terjual</span>
                            @endif
                        </td>
                        <td>
                            @if($item->no_whatsapp)
                                <a href="https://wa.me/{{ $item->no_whatsapp }}" target="_blank" class="text-cyan">
                                    <i class="fab fa-whatsapp"></i> {{ $item->no_whatsapp }}
                                </a>
                            @else
                                <span class="text-secondary">-</span>
                            @endif
                        </td>
                        <td>{{ $item->lokasi_tambak ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-secondary py-4">
                            <i class="fas fa-bullhorn fa-2x d-block mb-2" style="color:#475569;"></i>
                            Belum ada data promosi
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