<?php

namespace App\Http\Controllers;

use App\Models\Spesialisasi;
use Illuminate\Http\Request;

class SpesialisasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $spesialisasi = Spesialisasi::all();
        return view('spesialisasi.index', compact('spesialisasi'));
    }

    public function create()
    {
        return view('spesialisasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_spesialisasi' => 'required|string|max:255',
        ]);

        Spesialisasi::create($request->all());
        return redirect()->route('spesialisasi.index')->with('success', 'Spesialisasi berhasil ditambahkan.');
    }

    public function edit(Spesialisasi $spesialisasi)
    {
        return view('spesialisasi.edit', compact('spesialisasi'));
    }

    public function update(Request $request, Spesialisasi $spesialisasi)
    {
        $request->validate([
            'nama_spesialisasi' => 'required|string|max:255',
        ]);

        $spesialisasi->update($request->all());
        return redirect()->route('spesialisasi.index')->with('success', 'Spesialisasi berhasil diperbarui.');
    }

    public function destroy(Spesialisasi $spesialisasi)
    {
        $spesialisasi->delete();
        return redirect()->route('spesialisasi.index')->with('success', 'Spesialisasi berhasil dihapus.');
    }
}
