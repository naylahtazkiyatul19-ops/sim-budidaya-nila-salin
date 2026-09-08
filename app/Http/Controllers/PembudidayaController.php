<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembudidaya;

class PembudidayaController extends Controller
{
    public function index()
    {
        $pembudidaya = Pembudidaya::paginate(10);
        return view('pembudidaya.index', compact('pembudidaya'));
    }
    
    public function create()
    {
        return view('pembudidaya.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:15',
            'nama_umkm' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);
        
        Pembudidaya::create($request->all());
        
        return redirect()->route('pembudidaya.index')
            ->with('success', 'Pembudidaya berhasil ditambahkan!');
    }
    
    public function show(Pembudidaya $pembudidaya)
    {
        return view('pembudidaya.show', compact('pembudidaya'));
    }
    
    public function edit(Pembudidaya $pembudidaya)
    {
        return view('pembudidaya.edit', compact('pembudidaya'));
    }
    
    public function update(Request $request, Pembudidaya $pembudidaya)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:15',
            'nama_umkm' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);
        
        $pembudidaya->update($request->all());
        
        return redirect()->route('pembudidaya.index')
            ->with('success', 'Pembudidaya berhasil diperbarui!');
    }
    
    public function destroy(Pembudidaya $pembudidaya)
    {
        $pembudidaya->delete();
        
        return redirect()->route('pembudidaya.index')
            ->with('success', 'Pembudidaya berhasil dihapus!');
    }
}