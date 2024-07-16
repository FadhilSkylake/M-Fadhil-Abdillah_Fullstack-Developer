<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasien.create');
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


    public function show(Pasien $pasien)
    {
        return view('pasien.show', compact('pasien'));
    }

    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        // Validasi input
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'usia' => 'required|integer|min:0|max:120',
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'required|string|max:500',
        ]);

        // Update data pasien
        $pasien->update($request->all());

        // Redirect ke daftar pasien
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }


    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index');
    }
}
