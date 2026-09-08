@extends('layouts.app')

@section('title', 'Edit Panen - SIM Budidaya Nila Salin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-fish text-cyan me-2"></i> Edit Panen
            </div>
            <div class="card-body">
                <form action="{{ route('panen.update', $panen->id) }}" method="POST">
                    @csrf @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Kolam <span class="text-danger">*</span></label>
                        <select name="kolam_id" class="form-control @error('kolam_id') is-invalid @enderror" required>
                            <option value="">Pilih Kolam</option>
                            @foreach($kolam as $item)
                                <option value="{{ $item->id }}" {{ old('kolam_id', $panen->kolam_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kolam }} - {{ $item->pembudidaya->nama ?? '' }}
                                </option>
                            @endforeach
                        </select>
                        @error('kolam_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Panen <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_panen" class="form-control @error('tanggal_panen') is-invalid @enderror" value="{{ old('tanggal_panen', $panen->tanggal_panen) }}" required>
                        @error('tanggal_panen') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Berat Panen (kg) <span class="text-danger">*</span></label>
                        <input type="number" name="berat_panen" class="form-control @error('berat_panen') is-invalid @enderror" value="{{ old('berat_panen', $panen->berat_panen) }}" step="0.01" required>
                        @error('berat_panen') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga per kg</label>
                        <input type="number" name="harga_per_kg" class="form-control @error('harga_per_kg') is-invalid @enderror" value="{{ old('harga_per_kg', $panen->harga_per_kg) }}" step="100">
                        @error('harga_per_kg') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                            <option value="tersedia" {{ old('status', $panen->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="terjual" {{ old('status', $panen->status) == 'terjual' ? 'selected' : '' }}>Terjual</option>
                            <option value="habis" {{ old('status', $panen->status) == 'habis' ? 'selected' : '' }}>Habis</option>
                        </select>
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="2">{{ old('keterangan', $panen->keterangan) }}</textarea>
                        @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-cyan">
                            <i class="fas fa-save me-2"></i> Update
                        </button>
                        <a href="{{ route('panen.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection