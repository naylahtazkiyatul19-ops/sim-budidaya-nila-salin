<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pakan;

class PakanController extends Controller
{
    public function index()
    {
        $pakan = Pakan::paginate(10);
        return view('pakan.index', compact('pakan'));
    }
    
    public function create()
    {
        return view('pakan.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama_pakan' => 'required|string|max:255',
            'stok' => 'required|numeric|min:0',
            'satuan' => 'required|string|max:50',
            'harga' => 'nullable|numeric|min:0',
        ]);
        
        Pakan::create($request->all());
        
        return redirect()->route('pakan.index')
            ->with('success', 'Data pakan berhasil ditambahkan!');
    }
    
    public function show(Pakan $pakan)
    {
        return view('pakan.show', compact('pakan'));
    }
    
    public function edit(Pakan $pakan)
    {
        return view('pakan.edit', compact('pakan'));
    }
    
    public function update(Request $request, Pakan $pakan)
    {
        $request->validate([
            'nama_pakan' => 'required|string|max:255',
            'stok' => 'required|numeric|min:0',
            'satuan' => 'required|string|max:50',
            'harga' => 'nullable|numeric|min:0',
        ]);
        
        $pakan->update($request->all());
        
        return redirect()->route('pakan.index')
            ->with('success', 'Data pakan berhasil diperbarui!');
    }
    
    public function destroy(Pakan $pakan)
    {
        $pakan->delete();
        
        return redirect()->route('pakan.index')
            ->with('success', 'Data pakan berhasil dihapus!');
    }
}