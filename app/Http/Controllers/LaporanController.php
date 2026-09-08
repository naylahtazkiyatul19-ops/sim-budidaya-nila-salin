<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembudidaya;
use App\Models\Kolam;
use App\Models\Benih;
use App\Models\Pakan;
use App\Models\PemberianPakan;
use App\Models\Panen;
use App\Models\Penjualan;
use App\Models\Promosi;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type', 'budidaya');
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
        
        $view = 'laporan.index';
        $data = [];
        
        switch ($type) {
            case 'budidaya':
                $view = 'laporan.budidaya';
                $data['pembudidaya'] = Pembudidaya::with(['kolams.benihs', 'kolams.panens.penjualans'])->get();
                break;
            case 'panen':
                $view = 'laporan.panen';
                $query = Panen::with(['kolam.pembudidaya']);
                if ($start_date && $end_date) {
                    $query->whereBetween('tanggal_panen', [$start_date, $end_date]);
                }
                $data['panen'] = $query->orderBy('tanggal_panen', 'desc')->get();
                break;
            case 'penjualan':
                $view = 'laporan.penjualan';
                $query = Penjualan::with(['pembudidaya', 'panen.kolam']);
                if ($start_date && $end_date) {
                    $query->whereBetween('tanggal_penjualan', [$start_date, $end_date]);
                }
                $data['penjualan'] = $query->orderBy('tanggal_penjualan', 'desc')->get();
                $data['total'] = $query->sum('total_harga');
                break;
            case 'promosi':
                $view = 'laporan.promosi';
                $query = Promosi::with(['pembudidaya', 'panen.kolam']);
                if ($start_date && $end_date) {
                    $query->whereBetween('created_at', [$start_date, $end_date]);
                }
                $data['promosi'] = $query->orderBy('created_at', 'desc')->get();
                break;
            default:
                $view = 'laporan.budidaya';
                $data['pembudidaya'] = Pembudidaya::with(['kolams.benihs', 'kolams.panens.penjualans'])->get();
        }
        
        $data['type'] = $type;
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        
        return view($view, $data);
    }
}