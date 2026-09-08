@extends('layouts.app')

@section('title', 'Tambah Kolam - SIM Budidaya Nila Salin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-plus text-cyan me-2"></i> Tambah Kolam
            </div>
            <div class="card-body">
                <form action="{{ route('kolam.store') }}" method="POST">
                    @csrf
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
                        <label class="form-label">Nama Kolam <span class="text-danger">*</span></label>
                        <input type="text" name="nama_kolam" class="form-control @error('nama_kolam') is-invalid @enderror" value="{{ old('nama_kolam') }}" required>
                        @error('nama_kolam') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Luas (m²)</label>
                        <input type="number" name="luas" class="form-control @error('luas') is-invalid @enderror" value="{{ old('luas') }}" step="0.01">
                        @error('luas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <textarea name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" rows="2">{{ old('lokasi') }}</textarea>
                        @error('lokasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            <option value="kosong" {{ old('status') == 'kosong' ? 'selected' : '' }}>Kosong</option>
                        </select>
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-cyan">
                            <i class="fas fa-save me-2"></i> Simpan
                        </button>
                        <a href="{{ route('kolam.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection