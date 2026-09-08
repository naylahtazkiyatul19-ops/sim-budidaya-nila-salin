@extends('layouts.app')

@section('title', 'Tambah Promosi - SIM Budidaya Nila Salin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-plus text-cyan me-2"></i> Tambah Promosi
            </div>
            <div class="card-body">
                <form action="{{ route('promosi.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Pilih Panen <span class="text-danger">*</span></label>
                        <select name="panen_id" class="form-control @error('panen_id') is-invalid @enderror" required>
                            <option value="">Pilih Panen</option>
                            @foreach($panen as $item)
                                <option value="{{ $item->id }}" {{ old('panen_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->kolam->nama_kolam ?? '-' }} - {{ $item->kolam->pembudidaya->nama ?? '' }} 
                                    ({{ number_format($item->berat_panen, 0, ',', '.') }} kg)
                                </option>
                            @endforeach
                        </select>
                        @error('panen_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pembudidaya <span class="text-danger">*</span></label>
                        <select name="pembudidaya_id" class="form-control @error('pembudidaya_id') is-invalid @enderror" required>
                            <option value="">Pilih Pembudidaya</option>
                            @foreach($pembudidaya as $item)
                                <option value="{{ $item->id }}" {{ old('pembudidaya_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('pembudidaya_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Promosi <span class="text-danger">*</span></label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required>
                        @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto (URL)</label>
                        <input type="text" name="foto" class="form-control @error('foto') is-invalid @enderror" value="{{ old('foto') }}" placeholder="https://example.com/gambar.jpg">
                        @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga per kg <span class="text-danger">*</span></label>
                        <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" step="100" required>
                        @error('harga') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok (kg) <span class="text-danger">*</span></label>
                        <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}" step="0.01" required>
                        @error('stok') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor WhatsApp</label>
                        <input type="text" name="no_whatsapp" class="form-control @error('no_whatsapp') is-invalid @enderror" value="{{ old('no_whatsapp') }}" placeholder="081234567890">
                        @error('no_whatsapp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lokasi Tambak</label>
                        <input type="text" name="lokasi_tambak" class="form-control @error('lokasi_tambak') is-invalid @enderror" value="{{ old('lokasi_tambak') }}" placeholder="Blok Sawah Wanantara">
                        @error('lokasi_tambak') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            <option value="terjual" {{ old('status') == 'terjual' ? 'selected' : '' }}>Terjual</option>
                        </select>
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai', date('Y-m-d')) }}">
                        @error('tanggal_mulai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" value="{{ old('tanggal_selesai') }}">
                        @error('tanggal_selesai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <small>Promosi akan muncul di halaman publik untuk dilihat oleh calon pembeli.</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-cyan">
                            <i class="fas fa-save me-2"></i> Simpan
                        </button>
                        <a href="{{ route('promosi.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection