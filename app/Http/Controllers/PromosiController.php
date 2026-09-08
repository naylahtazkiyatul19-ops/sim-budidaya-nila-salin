<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promosi;
use App\Models\Panen;
use App\Models\Pembudidaya;

class PromosiController extends Controller
{
    public function index()
    {
        $promosi = Promosi::with(['panen.kolam.pembudidaya', 'pembudidaya'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('promosi.index', compact('promosi'));
    }
    
    public function create()
    {
        $panen = Panen::with('kolam.pembudidaya')->where('status', 'tersedia')->get();
        $pembudidaya = Pembudidaya::all();
        return view('promosi.create', compact('panen', 'pembudidaya'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'panen_id' => 'required|exists:panen,id',
            'pembudidaya_id' => 'required|exists:pembudidaya,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0.1',
            'no_whatsapp' => 'nullable|string|max:15',
            'lokasi_tambak' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif,terjual',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after:tanggal_mulai',
        ]);
        
        Promosi::create($request->all());
        
        return redirect()->route('promosi.index')
            ->with('success', 'Promosi berhasil ditambahkan!');
    }
    
    public function show(Promosi $promosi)
    {
        $promosi->load(['panen.kolam.pembudidaya', 'pembudidaya']);
        return view('promosi.show', compact('promosi'));
    }
    
    public function edit(Promosi $promosi)
    {
        $panen = Panen::with('kolam.pembudidaya')->get();
        $pembudidaya = Pembudidaya::all();
        return view('promosi.edit', compact('promosi', 'panen', 'pembudidaya'));
    }
    
    public function update(Request $request, Promosi $promosi)
    {
        $request->validate([
            'panen_id' => 'required|exists:panen,id',
            'pembudidaya_id' => 'required|exists:pembudidaya,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0.1',
            'no_whatsapp' => 'nullable|string|max:15',
            'lokasi_tambak' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif,terjual',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after:tanggal_mulai',
        ]);
        
        $promosi->update($request->all());
        
        return redirect()->route('promosi.index')
            ->with('success', 'Promosi berhasil diperbarui!');
    }
    
    public function destroy(Promosi $promosi)
    {
        $promosi->delete();
        
        return redirect()->route('promosi.index')
            ->with('success', 'Promosi berhasil dihapus!');
    }
}