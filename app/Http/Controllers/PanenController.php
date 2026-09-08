<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panen;
use App\Models\Kolam;

class PanenController extends Controller
{
    public function index()
    {
        $panen = Panen::with(['kolam.pembudidaya'])->orderBy('tanggal_panen', 'desc')->paginate(10);
        return view('panen.index', compact('panen'));
    }
    
    public function create()
    {
        $kolam = Kolam::with('pembudidaya')->where('status', 'aktif')->get();
        return view('panen.create', compact('kolam'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'kolam_id' => 'required|exists:kolam,id',
            'tanggal_panen' => 'required|date',
            'berat_panen' => 'required|numeric|min:0.1',
            'harga_per_kg' => 'nullable|numeric|min:0',
            'status' => 'required|in:tersedia,terjual,habis',
            'keterangan' => 'nullable|string',
        ]);
        
        Panen::create($request->all());
        
        return redirect()->route('panen.index')
            ->with('success', 'Data panen berhasil ditambahkan!');
    }
    
    public function show(Panen $panen)
    {
        $panen->load(['kolam.pembudidaya', 'penjualans']);
        return view('panen.show', compact('panen'));
    }
    
    public function edit(Panen $panen)
    {
        $kolam = Kolam::with('pembudidaya')->get();
        return view('panen.edit', compact('panen', 'kolam'));
    }
    
    public function update(Request $request, Panen $panen)
    {
        $request->validate([
            'kolam_id' => 'required|exists:kolam,id',
            'tanggal_panen' => 'required|date',
            'berat_panen' => 'required|numeric|min:0.1',
            'harga_per_kg' => 'nullable|numeric|min:0',
            'status' => 'required|in:tersedia,terjual,habis',
            'keterangan' => 'nullable|string',
        ]);
        
        $panen->update($request->all());
        
        return redirect()->route('panen.index')
            ->with('success', 'Data panen berhasil diperbarui!');
    }
    
    public function destroy(Panen $panen)
    {
        $panen->delete();
        
        return redirect()->route('panen.index')
            ->with('success', 'Data panen berhasil dihapus!');
    }
}