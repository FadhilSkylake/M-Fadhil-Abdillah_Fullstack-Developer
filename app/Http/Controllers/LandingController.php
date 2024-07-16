<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $dokters = Dokter::with('spesialisasi')->get();
        return view('landing.index', compact('dokters'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'usia' => 'required|integer|min:0|max:120',
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'required|string|max:500',
        ]);

        // Simpan data pasien baru
        Pasien::create($request->all());

        // Redirect ke daftar pasien
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil ditambahkan.');
    }
}
