@extends('layouts.app')

@section('title', 'Edit Benih - SIM Budidaya Nila Salin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-edit text-cyan me-2"></i> Edit Benih
            </div>
            <div class="card-body">
                <form action="{{ route('benih.update', $benih->id) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Kolam <span class="text-danger">*</span></label>
                        <select name="kolam_id" class="form-control @error('kolam_id') is-invalid @enderror" required>
                            <option value="">Pilih Kolam</option>
                            @foreach($kolam as $item)
                                <option value="{{ $item->id }}" {{ old('kolam_id', $benih->kolam_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kolam }} - {{ $item->pembudidaya->nama ?? '' }}
                                </option>
                            @endforeach
                        </select>
                        @error('kolam_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jumlah Benih <span class="text-danger">*</span></label>
                        <input type="number" name="jumlah_benih" class="form-control @error('jumlah_benih') is-invalid @enderror" value="{{ old('jumlah_benih', $benih->jumlah_benih) }}" required>
                        @error('jumlah_benih') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Tebar <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_tebar" class="form-control @error('tanggal_tebar') is-invalid @enderror" value="{{ old('tanggal_tebar', $benih->tanggal_tebar) }}" required>
                        @error('tanggal_tebar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sumber Benih</label>
                        <input type="text" name="sumber_benih" class="form-control @error('sumber_benih') is-invalid @enderror" value="{{ old('sumber_benih', $benih->sumber_benih) }}">
                        @error('sumber_benih') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="2">{{ old('keterangan', $benih->keterangan) }}</textarea>
                        @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-cyan">
                            <i class="fas fa-save me-2"></i> Update
                        </button>
                        <a href="{{ route('benih.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection