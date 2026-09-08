<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembudidaya - SIM Nila Salin</title>
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
        .main { padding: 30px; max-width: 800px; margin: 0 auto; }
        .page-title { margin-bottom: 30px; }
        .page-title h1 { font-size: 32px; font-weight: 800; }
        .page-title h1 .highlight { background: linear-gradient(135deg, #00d4ff, #0891b2); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .page-title p { color: #94a3b8; font-size: 16px; margin-top: 4px; }
        .card { background: rgba(17,24,39,0.6); backdrop-filter: blur(10px); border: 1px solid rgba(0,212,255,0.05); border-radius: 16px; padding: 30px; }
        .detail-item { display: flex; padding: 12px 0; border-bottom: 1px solid rgba(0,212,255,0.05); }
        .detail-item:last-child { border-bottom: none; }
        .detail-label { color: #94a3b8; font-weight: 500; width: 150px; flex-shrink: 0; }
        .detail-value { color: #e2e8f0; }
        .btn-cyan { background: linear-gradient(135deg, #00d4ff, #0891b2); color: #0a0e1a; font-weight: 600; border: none; border-radius: 10px; padding: 10px 24px; transition: all 0.3s; }
        .btn-cyan:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(0,212,255,0.3); color: #0a0e1a; }
        .btn-secondary { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #94a3b8; border-radius: 10px; padding: 10px 24px; transition: all 0.3s; }
        .btn-secondary:hover { background: rgba(255,255,255,0.1); color: #e2e8f0; }
        .text-cyan { color: #00d4ff; }
        @media (max-width: 768px) { .main { padding: 15px; } .page-title h1 { font-size: 24px; } .card { padding: 20px; } .detail-label { width: 100px; font-size: 13px; } }
    </style>
</head>
<body>
    <nav class="navbar">
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
    </nav>

    <div class="main">
        <div class="page-title">
            <h1><i class="fas fa-user text-cyan"></i> Detail <span class="highlight">Pembudidaya</span></h1>
            <p>Informasi lengkap data pembudidaya</p>
        </div>

        <div class="card">
            <div class="detail-item">
                <div class="detail-label"><i class="fas fa-user text-cyan me-2"></i> Nama</div>
                <div class="detail-value"><strong>{{ $pembudidaya->nama }}</strong></div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="fas fa-map-marker-alt text-cyan me-2"></i> Alamat</div>
                <div class="detail-value">{{ $pembudidaya->alamat ?? '-' }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="fas fa-phone text-cyan me-2"></i> No HP</div>
                <div class="detail-value">{{ $pembudidaya->no_hp ?? '-' }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="fas fa-store text-cyan me-2"></i> Nama UMKM</div>
                <div class="detail-value">{{ $pembudidaya->nama_umkm ?? '-' }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="fas fa-info-circle text-cyan me-2"></i> Deskripsi</div>
                <div class="detail-value">{{ $pembudidaya->deskripsi ?? '-' }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="fas fa-calendar-alt text-cyan me-2"></i> Dibuat</div>
                <div class="detail-value">{{ $pembudidaya->created_at->format('d F Y H:i') }}</div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <a href="{{ route('pembudidaya.edit', $pembudidaya->id) }}" class="btn btn-cyan">
                    <i class="fas fa-edit me-2"></i> Edit
                </a>
                <a href="{{ route('pembudidaya.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>