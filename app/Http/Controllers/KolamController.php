<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kolam;
use App\Models\Pembudidaya;

class KolamController extends Controller
{
    public function index()
    {
        $kolam = Kolam::with('pembudidaya')->paginate(10);
        return view('kolam.index', compact('kolam'));
    }

    public function create()
    {
        $pembudidaya = Pembudidaya::all();
        return view('kolam.create', compact('pembudidaya'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pembudidaya_id' => 'required|exists:pembudidaya,id',
            'nama_kolam' => 'required|string|max:255',
            'luas' => 'nullable|numeric',
            'lokasi' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif,kosong',
        ]);

        Kolam::create($request->all());

        return redirect()->route('kolam.index')
            ->with('success', 'Kolam berhasil ditambahkan!');
    }

    public function show(Kolam $kolam)
    {
        $kolam->load('pembudidaya', 'benihs', 'panens');
        return view('kolam.show', compact('kolam'));
    }

    public function edit(Kolam $kolam)
    {
        $pembudidaya = Pembudidaya::all();
        return view('kolam.edit', compact('kolam', 'pembudidaya'));
    }

    public function update(Request $request, Kolam $kolam)
    {
        $request->validate([
            'pembudidaya_id' => 'required|exists:pembudidaya,id',
            'nama_kolam' => 'required|string|max:255',
            'luas' => 'nullable|numeric',
            'lokasi' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif,kosong',
        ]);

        $kolam->update($request->all());

        return redirect()->route('kolam.index')
            ->with('success', 'Kolam berhasil diperbarui!');
    }

    public function destroy(Kolam $kolam)
    {
        $kolam->delete();

        return redirect()->route('kolam.index')
            ->with('success', 'Kolam berhasil dihapus!');
    }
}