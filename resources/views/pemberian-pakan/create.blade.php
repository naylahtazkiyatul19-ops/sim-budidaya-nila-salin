@extends('layouts.app')

@section('title', 'Tambah Pemberian Pakan - SIM Budidaya Nila Salin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-plus text-cyan me-2"></i> Tambah Pemberian Pakan
            </div>
            <div class="card-body">
                <form action="{{ route('pemberian-pakan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Kolam <span class="text-danger">*</span></label>
                        <select name="kolam_id" class="form-control @error('kolam_id') is-invalid @enderror" required>
                            <option value="">Pilih Kolam</option>
                            @foreach($kolam as $item)
                                <option value="{{ $item->id }}" {{ old('kolam_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kolam }} - {{ $item->pembudidaya->nama ?? '' }}
                                </option>
                            @endforeach
                        </select>
                        @error('kolam_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pakan <span class="text-danger">*</span></label>
                        <select name="pakan_id" class="form-control @error('pakan_id') is-invalid @enderror" required>
                            <option value="">Pilih Pakan</option>
                            @foreach($pakan as $item)
                                <option value="{{ $item->id }}" {{ old('pakan_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_pakan }} (Stok: {{ number_format($item->stok, 0, ',', '.') }} {{ $item->satuan }})
                                </option>
                            @endforeach
                        </select>
                        @error('pakan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                        @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jumlah <span class="text-danger">*</span></label>
                        <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}" step="0.01" required>
                        <small class="text-secondary">Stok akan berkurang secara otomatis</small>
                        @error('jumlah') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="2">{{ old('keterangan') }}</textarea>
                        @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <small>Pastikan stok pakan mencukupi sebelum menambahkan pemberian pakan.</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-cyan">
                            <i class="fas fa-save me-2"></i> Simpan
                        </button>
                        <a href="{{ route('pemberian-pakan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection