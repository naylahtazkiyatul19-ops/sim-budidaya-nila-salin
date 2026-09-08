@extends('layouts.app')

@section('title', 'Dashboard - SIM Budidaya Nila Salin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="text-light">Dashboard</h5>
            <span class="text-secondary small">
                <i class="fas fa-calendar-alt me-1"></i> {{ date('d F Y') }}
            </span>
        </div>
    </div>
</div>

<!-- Stats -->
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-number">{{ \App\Models\Pembudidaya::count() }}</div>
                    <div class="stat-label">Pembudidaya</div>
                </div>
                <div class="stat-icon" style="background: rgba(0,212,255,0.1);">
                    <i class="fas fa-users text-cyan"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-number">{{ \App\Models\Kolam::count() }}</div>
                    <div class="stat-label">Kolam Aktif</div>
                </div>
                <div class="stat-icon" style="background: rgba(16,185,129,0.1);">
                    <i class="fas fa-water text-success"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-number">{{ number_format(\App\Models\Benih::sum('jumlah_benih'), 0, ',', '.') }}</div>
                    <div class="stat-label">Total Benih Ditebar</div>
                </div>
                <div class="stat-icon" style="background: rgba(251,191,36,0.1);">
                    <i class="fas fa-seedling text-warning"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-number">{{ number_format(\App\Models\Panen::sum('berat_panen'), 0, ',', '.') }} kg</div>
                    <div class="stat-label">Total Panen</div>
                </div>
                <div class="stat-icon" style="background: rgba(139,92,246,0.1);">
                    <i class="fas fa-harvest text-purple"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Welcome Card -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-light">
                    <i class="fas fa-wave-square text-cyan"></i> 
                    Selamat Datang, {{ auth()->user()->name ?? 'Admin' }}!
                </h5>
                <p class="text-secondary">Sistem Informasi Manajemen Budidaya Perikanan Ikan Nila Salin berjalan dengan baik.</p>
                <div class="mt-2">
                    <span class="badge bg-success">
                        <i class="fas fa-circle me-1" style="font-size:8px;"></i> Sistem Aktif
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="row g-3 mt-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-harvest me-2 text-cyan"></i> Panen Terbaru
            </div>
            <div class="card-body">
                @php $recentPanen = \App\Models\Panen::with('kolam.pembudidaya')->orderBy('created_at','desc')->take(5)->get(); @endphp
                @forelse($recentPanen as $item)
                <div class="d-flex justify-content-between align-items-center border-bottom border-secondary pb-2 mb-2">
                    <div>
                        <small class="text-light">{{ $item->kolam->nama_kolam ?? 'Kolam' }}</small>
                        <br>
                        <span class="text-secondary small">{{ $item->kolam->pembudidaya->nama ?? 'Pembudidaya' }}</span>
                    </div>
                    <div class="text-end">
                        <span class="text-cyan">{{ number_format($item->berat_panen, 0, ',', '.') }} kg</span>
                        <br>
                        <span class="text-secondary small">{{ $item->tanggal_panen }}</span>
                    </div>
                </div>
                @empty
                <p class="text-secondary text-center">Belum ada data panen</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-money-bill-wave me-2 text-cyan"></i> Penjualan Terbaru
            </div>
            <div class="card-body">
                @php $recentPenjualan = \App\Models\Penjualan::with('pembudidaya','panen')->orderBy('created_at','desc')->take(5)->get(); @endphp
                @forelse($recentPenjualan as $item)
                <div class="d-flex justify-content-between align-items-center border-bottom border-secondary pb-2 mb-2">
                    <div>
                        <small class="text-light">{{ $item->pembudidaya->nama ?? 'Pembudidaya' }}</small>
                        <br>
                        <span class="text-secondary small">{{ $item->pembeli ?? 'Pembeli' }}</span>
                    </div>
                    <div class="text-end">
                        <span class="text-cyan">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</span>
                        <br>
                        <span class="text-secondary small">{{ $item->tanggal_penjualan }}</span>
                    </div>
                </div>
                @empty
                <p class="text-secondary text-center">Belum ada data penjualan</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection