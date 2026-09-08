<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Benih;
use App\Models\Kolam;

class BenihController extends Controller
{
    public function index()
    {
        $benih = Benih::with('kolam.pembudidaya')->paginate(10);
        return view('benih.index', compact('benih'));
    }
    
    public function create()
    {
        $kolam = Kolam::with('pembudidaya')->get();
        return view('benih.create', compact('kolam'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'kolam_id' => 'required|exists:kolam,id',
            'jumlah_benih' => 'required|integer|min:1',
            'tanggal_tebar' => 'required|date',
            'sumber_benih' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);
        
        Benih::create($request->all());
        
        return redirect()->route('benih.index')
            ->with('success', 'Data benih berhasil ditambahkan!');
    }
    
    public function show(Benih $benih)
    {
        $benih->load('kolam.pembudidaya');
        return view('benih.show', compact('benih'));
    }
    
    public function edit(Benih $benih)
    {
        $kolam = Kolam::with('pembudidaya')->get();
        return view('benih.edit', compact('benih', 'kolam'));
    }
    
    public function update(Request $request, Benih $benih)
    {
        $request->validate([
            'kolam_id' => 'required|exists:kolam,id',
            'jumlah_benih' => 'required|integer|min:1',
            'tanggal_tebar' => 'required|date',
            'sumber_benih' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);
        
        $benih->update($request->all());
        
        return redirect()->route('benih.index')
            ->with('success', 'Data benih berhasil diperbarui!');
    }
    
    public function destroy(Benih $benih)
    {
        $benih->delete();
        
        return redirect()->route('benih.index')
            ->with('success', 'Data benih berhasil dihapus!');
    }
}