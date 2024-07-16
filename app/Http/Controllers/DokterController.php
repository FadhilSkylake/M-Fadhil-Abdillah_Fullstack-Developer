<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Spesialisasi;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::with('spesialisasi')->get();
        return view('dokter.index', compact('dokters'));
    }

    public function create()
    {
        $spesialisasis = Spesialisasi::all();
        return view('dokter.create', compact('spesialisasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'spesialisasi_id' => 'required|exists:spesialisasi,id_spesialisasi',
            'jadwal_kerja' => 'required|string|max:255',
        ]);

        Dokter::create($request->all());
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function edit(Dokter $dokter)
    {
        $spesialisasis = Spesialisasi::all();
        return view('dokter.edit', compact('dokter', 'spesialisasis'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'spesialisasi_id' => 'required|exists:spesialisasi,id_spesialisasi',
            'jadwal_kerja' => 'required|string|max:255',
        ]);

        $dokter->update($request->all());
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil diperbarui.');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil dihapus.');
    }
}
