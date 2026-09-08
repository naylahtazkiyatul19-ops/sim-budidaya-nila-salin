@extends('layouts.app')

@section('title', 'Edit Pemberian Pakan - SIM Budidaya Nila Salin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-edit text-cyan me-2"></i> Edit Pemberian Pakan
            </div>
            <div class="card-body">
                <form action="{{ route('pemberian-pakan.update', $pemberianPakan->id) }}" method="POST">
                    @csrf @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Kolam <span class="text-danger">*</span></label>
                        <select name="kolam_id" class="form-control @error('kolam_id') is-invalid @enderror" required>
                            <option value="">Pilih Kolam</option>
                            @foreach($kolam as $item)
                                <option value="{{ $item->id }}" {{ old('kolam_id', $pemberianPakan->kolam_id) == $item->id ? 'selected' : '' }}>
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
                                <option value="{{ $item->id }}" {{ old('pakan_id', $pemberianPakan->pakan_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_pakan }} (Stok: {{ number_format($item->stok, 0, ',', '.') }} {{ $item->satuan }})
                                </option>
                            @endforeach
                        </select>
                        @error('pakan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $pemberianPakan->tanggal) }}" required>
                        @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jumlah <span class="text-danger">*</span></label>
                        <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', $pemberianPakan->jumlah) }}" step="0.01" required>
                        <small class="text-secondary">Stok akan disesuaikan secara otomatis</small>
                        @error('jumlah') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="2">{{ old('keterangan', $pemberianPakan->keterangan) }}</textarea>
                        @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <small>Mengubah data akan mempengaruhi stok pakan.</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-cyan">
                            <i class="fas fa-save me-2"></i> Update
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