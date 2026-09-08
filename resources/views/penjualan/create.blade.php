@extends('layouts.app')

@section('title', 'Tambah Penjualan - SIM Budidaya Nila Salin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-plus text-cyan me-2"></i> Tambah Penjualan
            </div>
            <div class="card-body">
                <form action="{{ route('penjualan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Pilih Panen <span class="text-danger">*</span></label>
                        <select name="panen_id" class="form-control @error('panen_id') is-invalid @enderror" required>
                            <option value="">Pilih Panen</option>
                            @foreach($panen as $item)
                                <option value="{{ $item->id }}" {{ old('panen_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->kolam->nama_kolam ?? '-' }} - {{ $item->kolam->pembudidaya->nama ?? '' }} 
                                    (Sisa: {{ number_format($item->berat_panen, 0, ',', '.') }} kg)
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
                        <label class="form-label">Tanggal Penjualan <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_penjualan" class="form-control @error('tanggal_penjualan') is-invalid @enderror" value="{{ old('tanggal_penjualan', date('Y-m-d')) }}" required>
                        @error('tanggal_penjualan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jumlah (kg) <span class="text-danger">*</span></label>
                        <input type="number" name="jumlah_kg" class="form-control @error('jumlah_kg') is-invalid @enderror" value="{{ old('jumlah_kg') }}" step="0.01" required>
                        <small class="text-secondary">Stok panen akan berkurang secara otomatis</small>
                        @error('jumlah_kg') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga per kg <span class="text-danger">*</span></label>
                        <input type="number" name="harga_per_kg" class="form-control @error('harga_per_kg') is-invalid @enderror" value="{{ old('harga_per_kg') }}" step="100" required>
                        @error('harga_per_kg') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Total Harga <span class="text-danger">*</span></label>
                        <input type="number" name="total_harga" class="form-control @error('total_harga') is-invalid @enderror" value="{{ old('total_harga') }}" step="100" required>
                        @error('total_harga') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Pembeli</label>
                        <input type="text" name="pembeli" class="form-control @error('pembeli') is-invalid @enderror" value="{{ old('pembeli') }}">
                        @error('pembeli') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No HP Pembeli</label>
                        <input type="text" name="no_hp_pembeli" class="form-control @error('no_hp_pembeli') is-invalid @enderror" value="{{ old('no_hp_pembeli') }}">
                        @error('no_hp_pembeli') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Metode Penjualan <span class="text-danger">*</span></label>
                        <select name="metode_penjualan" class="form-control @error('metode_penjualan') is-invalid @enderror" required>
                            <option value="langsung_tambak" {{ old('metode_penjualan') == 'langsung_tambak' ? 'selected' : '' }}>Langsung ke Tambak</option>
                            <option value="pembeli_datang" {{ old('metode_penjualan') == 'pembeli_datang' ? 'selected' : '' }}>Pembeli Datang ke Tambak</option>
                        </select>
                        @error('metode_penjualan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="2">{{ old('keterangan') }}</textarea>
                        @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <small>Stok panen akan berkurang secara otomatis sesuai jumlah yang dijual.</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-cyan">
                            <i class="fas fa-save me-2"></i> Simpan
                        </button>
                        <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection