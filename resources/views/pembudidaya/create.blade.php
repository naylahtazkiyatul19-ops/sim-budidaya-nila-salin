<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembudidaya - SIM Nila Salin</title>
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
        .form-label { color: #94a3b8; font-weight: 500; font-size: 14px; }
        .form-control { background: rgba(10,14,26,0.6); border: 1px solid rgba(0,212,255,0.08); color: #e2e8f0; border-radius: 10px; padding: 12px 16px; font-size: 15px; }
        .form-control:focus { background: rgba(10,14,26,0.8); border-color: #00d4ff; box-shadow: 0 0 30px rgba(0,212,255,0.05); color: #e2e8f0; }
        .form-control::placeholder { color: #475569; }
        .form-control.is-invalid { border-color: #f87171; }
        .invalid-feedback { color: #f87171; font-size: 13px; }
        .btn-cyan { background: linear-gradient(135deg, #00d4ff, #0891b2); color: #0a0e1a; font-weight: 600; border: none; border-radius: 10px; padding: 12px 30px; transition: all 0.3s; }
        .btn-cyan:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(0,212,255,0.3); color: #0a0e1a; }
        .btn-secondary { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #94a3b8; border-radius: 10px; padding: 12px 30px; transition: all 0.3s; }
        .btn-secondary:hover { background: rgba(255,255,255,0.1); color: #e2e8f0; }
        .text-cyan { color: #00d4ff; }
        @media (max-width: 768px) { .main { padding: 15px; } .page-title h1 { font-size: 24px; } .card { padding: 20px; } }
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
            <h1><i class="fas fa-user-plus text-cyan"></i> Tambah <span class="highlight">Pembudidaya</span></h1>
            <p>Isi form di bawah untuk menambahkan data pembudidaya baru</p>
        </div>

        <div class="card">
            <form action="{{ route('pembudidaya.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-user text-cyan"></i> Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama lengkap" value="{{ old('nama') }}" required>
                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-map-marker-alt text-cyan"></i> Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="2" placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-phone text-cyan"></i> Nomor HP</label>
                    <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Contoh: 081234567890" value="{{ old('no_hp') }}">
                    @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-store text-cyan"></i> Nama UMKM</label>
                    <input type="text" name="nama_umkm" class="form-control @error('nama_umkm') is-invalid @enderror" placeholder="Masukkan nama UMKM" value="{{ old('nama_umkm') }}">
                    @error('nama_umkm') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label"><i class="fas fa-info-circle text-cyan"></i> Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="2" placeholder="Deskripsi singkat tentang pembudidaya">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-cyan">
                        <i class="fas fa-save me-2"></i> Simpan
                    </button>
                    <a href="{{ route('pembudidaya.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>