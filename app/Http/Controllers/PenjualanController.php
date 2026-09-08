<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Panen;
use App\Models\Pembudidaya;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with(['panen.kolam.pembudidaya', 'pembudidaya'])
            ->orderBy('tanggal_penjualan', 'desc')
            ->paginate(10);
        return view('penjualan.index', compact('penjualan'));
    }
    
    public function create()
    {
        $panen = Panen::with('kolam.pembudidaya')->where('status', 'tersedia')->get();
        $pembudidaya = Pembudidaya::all();
        return view('penjualan.create', compact('panen', 'pembudidaya'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'panen_id' => 'required|exists:panen,id',
            'pembudidaya_id' => 'required|exists:pembudidaya,id',
            'tanggal_penjualan' => 'required|date',
            'jumlah_kg' => 'required|numeric|min:0.1',
            'harga_per_kg' => 'required|numeric|min:0',
            'total_harga' => 'required|numeric|min:0',
            'pembeli' => 'nullable|string|max:255',
            'no_hp_pembeli' => 'nullable|string|max:15',
            'metode_penjualan' => 'required|in:langsung_tambak,pembeli_datang',
            'keterangan' => 'nullable|string',
        ]);
        
        $panen = Panen::find($request->panen_id);
        if ($panen->berat_panen < $request->jumlah_kg) {
            return back()->with('error', 'Stok panen tidak mencukupi!');
        }
        $panen->berat_panen -= $request->jumlah_kg;
        if ($panen->berat_panen <= 0) {
            $panen->status = 'habis';
        } else {
            $panen->status = 'tersedia';
        }
        $panen->save();
        
        Penjualan::create($request->all());
        
        return redirect()->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil dicatat!');
    }
    
    public function show(Penjualan $penjualan)
    {
        $penjualan->load(['panen.kolam.pembudidaya', 'pembudidaya']);
        return view('penjualan.show', compact('penjualan'));
    }
    
    public function edit(Penjualan $penjualan)
    {
        $panen = Panen::with('kolam.pembudidaya')->get();
        $pembudidaya = Pembudidaya::all();
        return view('penjualan.edit', compact('penjualan', 'panen', 'pembudidaya'));
    }
    
    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'panen_id' => 'required|exists:panen,id',
            'pembudidaya_id' => 'required|exists:pembudidaya,id',
            'tanggal_penjualan' => 'required|date',
            'jumlah_kg' => 'required|numeric|min:0.1',
            'harga_per_kg' => 'required|numeric|min:0',
            'total_harga' => 'required|numeric|min:0',
            'pembeli' => 'nullable|string|max:255',
            'no_hp_pembeli' => 'nullable|string|max:15',
            'metode_penjualan' => 'required|in:langsung_tambak,pembeli_datang',
            'keterangan' => 'nullable|string',
        ]);
        
        $oldPanen = Panen::find($penjualan->panen_id);
        if ($oldPanen) {
            $oldPanen->berat_panen += $penjualan->jumlah_kg;
            $oldPanen->save();
        }
        
        $newPanen = Panen::find($request->panen_id);
        if ($newPanen->berat_panen < $request->jumlah_kg) {
            return back()->with('error', 'Stok panen tidak mencukupi!');
        }
        $newPanen->berat_panen -= $request->jumlah_kg;
        $newPanen->save();
        
        $penjualan->update($request->all());
        
        return redirect()->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil diperbarui!');
    }
    
    public function destroy(Penjualan $penjualan)
    {
        $panen = Panen::find($penjualan->panen_id);
        if ($panen) {
            $panen->berat_panen += $penjualan->jumlah_kg;
            $panen->save();
        }
        
        $penjualan->delete();
        
        return redirect()->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil dihapus!');
    }
}