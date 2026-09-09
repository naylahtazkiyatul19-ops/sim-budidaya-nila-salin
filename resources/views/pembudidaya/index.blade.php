@extends('layouts.app') {{-- Sesuaikan 'layouts.app' dengan file layout utama Anda (misal: layouts.main atau layouts.dashboard) --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembudidaya - SIM Nila Salin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #0a0e1a; color: #e2e8f0; }
        .navbar { background: rgba(17,24,39,0.9); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(0,212,255,0.05); padding: 16px 30px; display: flex; justify-content: space-between; align-items: center; }
        .navbar .brand { display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 20px; }
        .navbar .brand i { color: #00d4ff; font-size: 26px; }
        .navbar .brand span { background: linear-gradient(135deg, #00d4ff, #0891b2); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .navbar .user-info { display: flex; align-items: center; gap: 16px; }
        .navbar .user-info .user-name { color: #94a3b8; font-size: 15px; }
        .navbar .user-info .user-name i { color: #00d4ff; margin-right: 8px; }
        .btn-logout { padding: 8px 20px; background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.2); color: #f87171; border-radius: 8px; cursor: pointer; font-size: 13px; font-weight: 600; transition: all 0.3s; font-family: 'Inter', sans-serif; }
        .btn-logout:hover { background: rgba(239,68,68,0.2); }
        .btn-logout i { margin-right: 6px; }
        .main { padding: 30px; max-width: 1400px; margin: 0 auto; }
        .page-title { margin-bottom: 30px; }
        .page-title h1 { font-size: 32px; font-weight: 800; }
        .page-title h1 .highlight { background: linear-gradient(135deg, #00d4ff, #0891b2); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .page-title p { color: #94a3b8; font-size: 16px; margin-top: 4px; }
        .btn-cyan { background: linear-gradient(135deg, #00d4ff, #0891b2); color: #0a0e1a; font-weight: 600; border: none; border-radius: 10px; padding: 10px 24px; transition: all 0.3s; }
        .btn-cyan:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(0,212,255,0.3); color: #0a0e1a; }
        .btn-outline-cyan { background: transparent; color: #00d4ff; border: 2px solid #00d4ff; border-radius: 8px; padding: 6px 14px; font-size: 13px; transition: all 0.3s; }
        .btn-outline-cyan:hover { background: #00d4ff; color: #0a0e1a; }
        .card { background: rgba(17,24,39,0.6); backdrop-filter: blur(10px); border: 1px solid rgba(0,212,255,0.05); border-radius: 16px; overflow: hidden; }
        .card-header { background: transparent; border-bottom: 1px solid rgba(0,212,255,0.05); padding: 16px 20px; font-weight: 600; }
        .table { color: #e2e8f0; }
        .table thead th { background: rgba(0,0,0,0.2); color: #94a3b8; font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; border-color: rgba(0,212,255,0.05); padding: 12px 15px; }
        .table tbody td { padding: 12px 15px; border-color: rgba(0,212,255,0.05); vertical-align: middle; }
        .table tbody tr:hover { background: rgba(0,212,255,0.02); }
        .alert-success { background: rgba(16,185,129,0.15); border: 1px solid rgba(16,185,129,0.2); color: #34d399; border-radius: 10px; padding: 12px 16px; }
        .pagination .page-link { background: transparent; border-color: rgba(0,212,255,0.05); color: #94a3b8; }
        .pagination .page-link:hover { background: rgba(0,212,255,0.05); color: #00d4ff; }
        .pagination .page-item.active .page-link { background: #00d4ff; border-color: #00d4ff; color: #0a0e1a; }
        .text-cyan { color: #00d4ff; }
        .btn-warning { background: rgba(251,191,36,0.15); border: 1px solid rgba(251,191,36,0.2); color: #fbbf24; }
        .btn-warning:hover { background: rgba(251,191,36,0.25); color: #fbbf24; }
        .btn-danger { background: rgba(239,68,68,0.15); border: 1px solid rgba(239,68,68,0.2); color: #f87171; }
        .btn-danger:hover { background: rgba(239,68,68,0.25); color: #f87171; }
        .btn-sm { padding: 5px 12px; font-size: 13px; border-radius: 6px; }
        @media (max-width: 768px) { .main { padding: 15px; } .page-title h1 { font-size: 24px; } }
    </style>
</head>
<body>
    <!-- Navbar -->
    <!-- <nav class="navbar">
        <div class="brand">
            <i class="fas fa-fish"></i>
            <span>SIM Nila Salin</span>
        </div>
        <div class="user-info">
            <span class="user-name">
                <i class="fas fa-user-circle"></i>
                {{ auth()->user()->name ?? 'Admin' }}
            </span>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </nav> -->

    <!-- Main Content -->
    @section('content')
<div class="main">
    <div class="page-title">
        <h1><i class="fas fa-users text-cyan"></i> Data <span class="highlight">Pembudidaya</span></h1>
        <p>Kelola data pembudidaya ikan nila salin di Desa Wanantara</p>
    </div>

    @if(session('success'))
        <div class="alert-success alert-dismissible fade show" role="alert" style="padding:12px 16px; margin-bottom:20px; border-radius:10px;">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close" style="filter: invert(1);"></button>
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('pembudidaya.create') }}" class="btn btn-cyan">
            <i class="fas fa-plus me-2"></i> Tambah Pembudidaya
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>UMKM</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pembudidaya as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $item->nama }}</strong></td>
                            <td>{{ Str::limit($item->alamat, 30) }}</td>
                            <td>{{ $item->no_hp ?? '-' }}</td>
                            <td>{{ $item->nama_umkm ?? '-' }}</td>
                            <td style="text-align:center;">
                                <a href="{{ route('pembudidaya.show', $item->id) }}" class="btn btn-outline-cyan btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('pembudidaya.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('pembudidaya.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-4">
                                <i class="fas fa-users fa-2x d-block mb-2" style="color:#475569;"></i>
                                Belum ada data pembudidaya
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-transparent border-top border-secondary" style="border-color:rgba(0,212,255,0.05) !important;">
            <div class="d-flex justify-content-between align-items-center">
                <span class="text-secondary" style="font-size:13px;">Menampilkan {{ $pembudidaya->firstItem() ?? 0 }} - {{ $pembudidaya->lastItem() ?? 0 }} dari {{ $pembudidaya->total() }} data</span>
                {{ $pembudidaya->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>