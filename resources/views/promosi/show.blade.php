@extends('layouts.app')

@section('title', 'Detail Promosi - SIM Budidaya Nila Salin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-bullhorn text-cyan me-2"></i> Detail Promosi
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td style="width:150px; color:#94a3b8;">Judul</td>
                        <td><strong>{{ $promosi->judul }}</strong></td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Pembudidaya</td>
                        <td>{{ $promosi->pembudidaya->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Panen</td>
                        <td>{{ $promosi->panen->kolam->nama_kolam ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Deskripsi</td>
                        <td>{{ $promosi->deskripsi ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Harga</td>
                        <td><span class="text-cyan">Rp {{ number_format($promosi->harga, 0, ',', '.') }}</span> / kg</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Stok</td>
                        <td>{{ number_format($promosi->stok, 0, ',', '.') }} kg</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Status</td>
                        <td>
                            @if($promosi->status == 'aktif')
                                <span class="badge bg-success">Aktif</span>
                            @elseif($promosi->status == 'nonaktif')
                                <span class="badge bg-secondary">Nonaktif</span>
                            @else
                                <span class="badge bg-danger">Terjual</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">WhatsApp</td>
                        <td>
                            @if($promosi->no_whatsapp)
                                <a href="https://wa.me/{{ $promosi->no_whatsapp }}" target="_blank" class="text-cyan">
                                    <i class="fab fa-whatsapp"></i> {{ $promosi->no_whatsapp }}
                                </a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Lokasi Tambak</td>
                        <td>{{ $promosi->lokasi_tambak ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Tanggal Mulai</td>
                        <td>{{ $promosi->tanggal_mulai ? \Carbon\Carbon::parse($promosi->tanggal_mulai)->format('d F Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Tanggal Selesai</td>
                        <td>{{ $promosi->tanggal_selesai ? \Carbon\Carbon::parse($promosi->tanggal_selesai)->format('d F Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color:#94a3b8;">Dibuat</td>
                        <td>{{ $promosi->created_at->format('d F Y H:i') }}</td>
                    </tr>
                </table>

                <!-- Tombol WhatsApp -->
                @if($promosi->no_whatsapp)
                    <div class="mt-3">
                        <a href="https://wa.me/{{ $promosi->no_whatsapp }}?text=Halo%20saya%20tertarik%20dengan%20promosi%20{{ urlencode($promosi->judul) }}" 
                           target="_blank" 
                           class="btn btn-success w-100">
                            <i class="fab fa-whatsapp me-2"></i> Hubungi Pembudidaya via WhatsApp
                        </a>
                    </div>
                @endif

                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('promosi.edit', $promosi->id) }}" class="btn btn-cyan">
                        <i class="fas fa-edit me-2"></i> Edit
                    </a>
                    <a href="{{ route('promosi.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection