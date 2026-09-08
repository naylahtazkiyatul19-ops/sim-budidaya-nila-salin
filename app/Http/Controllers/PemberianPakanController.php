<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemberianPakan;
use App\Models\Kolam;
use App\Models\Pakan;

class PemberianPakanController extends Controller
{
    public function index()
    {
        $pemberianPakan = PemberianPakan::with(['kolam.pembudidaya', 'pakan'])
            ->orderBy('tanggal', 'desc')
            ->paginate(10);
        return view('pemberian-pakan.index', compact('pemberianPakan'));
    }
    
    public function create()
    {
        $kolam = Kolam::with('pembudidaya')->where('status', 'aktif')->get();
        $pakan = Pakan::all();
        return view('pemberian-pakan.create', compact('kolam', 'pakan'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'kolam_id' => 'required|exists:kolam,id',
            'pakan_id' => 'required|exists:pakan,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:0.1',
            'keterangan' => 'nullable|string',
        ]);
        
        $pakan = Pakan::find($request->pakan_id);
        if ($pakan->stok < $request->jumlah) {
            return back()->with('error', 'Stok pakan tidak mencukupi!');
        }
        $pakan->stok -= $request->jumlah;
        $pakan->save();
        
        PemberianPakan::create($request->all());
        
        return redirect()->route('pemberian-pakan.index')
            ->with('success', 'Pemberian pakan berhasil dicatat!');
    }
    
    public function show(PemberianPakan $pemberianPakan)
    {
        $pemberianPakan->load(['kolam.pembudidaya', 'pakan']);
        return view('pemberian-pakan.show', compact('pemberianPakan'));
    }
    
    public function edit(PemberianPakan $pemberianPakan)
    {
        $kolam = Kolam::with('pembudidaya')->where('status', 'aktif')->get();
        $pakan = Pakan::all();
        return view('pemberian-pakan.edit', compact('pemberianPakan', 'kolam', 'pakan'));
    }
    
    public function update(Request $request, PemberianPakan $pemberianPakan)
    {
        $request->validate([
            'kolam_id' => 'required|exists:kolam,id',
            'pakan_id' => 'required|exists:pakan,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:0.1',
            'keterangan' => 'nullable|string',
        ]);
        
        $oldPakan = Pakan::find($pemberianPakan->pakan_id);
        if ($oldPakan) {
            $oldPakan->stok += $pemberianPakan->jumlah;
            $oldPakan->save();
        }
        
        $newPakan = Pakan::find($request->pakan_id);
        if ($newPakan->stok < $request->jumlah) {
            return back()->with('error', 'Stok pakan tidak mencukupi!');
        }
        $newPakan->stok -= $request->jumlah;
        $newPakan->save();
        
        $pemberianPakan->update($request->all());
        
        return redirect()->route('pemberian-pakan.index')
            ->with('success', 'Pemberian pakan berhasil diperbarui!');
    }
    
    public function destroy(PemberianPakan $pemberianPakan)
    {
        $pakan = Pakan::find($pemberianPakan->pakan_id);
        if ($pakan) {
            $pakan->stok += $pemberianPakan->jumlah;
            $pakan->save();
        }
        
        $pemberianPakan->delete();
        
        return redirect()->route('pemberian-pakan.index')
            ->with('success', 'Pemberian pakan berhasil dihapus!');
    }
}