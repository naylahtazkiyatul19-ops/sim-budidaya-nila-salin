@extends('layouts.app')

@section('title', 'Laporan - SIM Budidaya Nila Salin')

@section('content')
<div class="row">
    <div class="col-12">
        <h5 class="text-light"><i class="fas fa-file-alt text-cyan"></i> Laporan</h5>
        <p class="text-secondary">Lihat dan cetak laporan budidaya ikan nila salin</p>
    </div>
</div>

<!-- Filter -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('laporan.index') }}" class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label">Jenis Laporan</label>
                <select name="type" class="form-control">
                    <option value="budidaya" {{ ($type ?? 'budidaya') == 'budidaya' ? 'selected' : '' }}>📊 Laporan Budidaya</option>
                    <option value="panen" {{ ($type ?? '') == 'panen' ? 'selected' : '' }}>🌾 Laporan Panen</option>
                    <option value="penjualan" {{ ($type ?? '') == 'penjualan' ? 'selected' : '' }}>💰 Laporan Penjualan</option>
                    <option value="promosi" {{ ($type ?? '') == 'promosi' ? 'selected' : '' }}>📢 Laporan Promosi</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" name="start_date" class="form-control" value="{{ $start_date ?? '' }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Tanggal Selesai</label>
                <input type="date" name="end_date" class="form-control" value="{{ $end_date ?? '' }}">
            </div>
            <div class="col-md-3">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-cyan w-100">
                        <i class="fas fa-filter me-2"></i> Filter
                    </button>
                    <button type="button" class="btn btn-outline-cyan" onclick="window.print()">
                        <i class="fas fa-print"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Tabel Laporan -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-table text-cyan me-2"></i> {{ $data['title'] ?? 'Laporan' }}</span>
        @if(isset($data['total']))
            <span class="text-cyan fw-bold">Total: {{ $data['total'] }}</span>
        @endif
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="laporanTable">
                <thead>
                    <tr>
                        @foreach($data['headers'] ?? [] as $header)
                            <th>{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @forelse($data['rows'] ?? [] as $row)
                        <tr>
                            @foreach($row as $cell)
                                <td>{{ $cell }}</td>
                            @endforeach
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($data['headers'] ?? []) }}" class="text-center text-secondary py-4">
                                <i class="fas fa-file fa-2x d-block mb-2" style="color:#475569;"></i>
                                Belum ada data untuk laporan ini
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent border-top border-secondary">
        <div class="d-flex justify-content-between align-items-center">
            <span class="text-secondary" style="font-size:13px;">
                Total data: {{ count($data['rows'] ?? []) }}
            </span>
            <span class="text-secondary" style="font-size:13px;">
                Dicetak: {{ date('d F Y H:i') }}
            </span>
        </div>
    </div>
</div>

<!-- Export Button -->
<div class="mt-3">
    <button type="button" class="btn btn-cyan" onclick="exportCSV()">
        <i class="fas fa-file-csv me-2"></i> Export CSV
    </button>
</div>

<style>
    @media print {
        .sidebar { display: none !important; }
        .main-content { margin-left: 0 !important; padding: 20px !important; }
        .btn, .btn-cyan, .btn-outline-cyan { display: none !important; }
        .card { border: 1px solid #2d3748 !important; }
        .card-header { background: #111827 !important; color: white !important; }
        .table { color: black !important; }
        .table th { background: #1a2236 !important; color: white !important; }
        body { background: white !important; color: black !important; }
    }
</style>
@endsection

@push('scripts')
<script>
function exportCSV() {
    const table = document.getElementById('laporanTable');
    let csv = [];
    
    // Header
    const headers = [];
    const ths = table.querySelectorAll('thead th');
    ths.forEach(th => headers.push(th.innerText));
    csv.push(headers.join(','));
    
    // Data
    const rows = table.querySelectorAll('tbody tr');
    rows.forEach(row => {
        const cols = [];
        const tds = row.querySelectorAll('td');
        tds.forEach(td => {
            let text = td.innerText.replace(/,/g, ';');
            cols.push('"' + text + '"');
        });
        csv.push(cols.join(','));
    });
    
    // Download
    const blob = new Blob(['\uFEFF' + csv.join('\n')], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = 'laporan_{{ $type ?? 'budidaya' }}_{{ date('Y-m-d') }}.csv';
    link.click();
}
</script>
@endpush