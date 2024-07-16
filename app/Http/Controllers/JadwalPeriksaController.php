<?php

namespace App\Http\Controllers;

use App\Models\JadwalPeriksa;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class JadwalPeriksaController extends Controller
{
    public function index()
    {
        $jadwals = JadwalPeriksa::with(['pasien', 'dokter'])->get();
        return view('jadwal.index', ['jadwals' => $jadwals]);
    }

    public function create()
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('jadwal.create', ['pasien' => $pasien, 'dokter' => $dokter]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasien,id_pasien',
            'dokter_id' => 'required|exists:dokter,id_dokter',
            'tanggal' => 'required|date',
            'status' => 'required|string|max:255',
        ]);

        JadwalPeriksa::create($request->all());
        return redirect()->route('jadwal-periksa.index')->with('success', 'Jadwal Periksa berhasil ditambahkan.');
    }

    public function show(JadwalPeriksa $jadwalPeriksa)
    {
        return view('jadwal.show', ['jadwalPeriksa' => $jadwalPeriksa]);
    }

    public function edit(JadwalPeriksa $jadwalPeriksa)
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('jadwal.edit', ['jadwalPeriksa' => $jadwalPeriksa, 'pasien' => $pasien, 'dokter' => $dokter]);
    }

    public function update(Request $request, JadwalPeriksa $jadwalPeriksa)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasien,id_pasien',
            'dokter_id' => 'required|exists:dokter,id_dokter',
            'tanggal' => 'required|date',
            'status' => 'required|string|max:255',
        ]);

        $jadwalPeriksa->update($request->all());
        return redirect()->route('jadwal-periksa.index')->with('success', 'Jadwal Periksa berhasil diperbarui.');
    }

    public function destroy(JadwalPeriksa $jadwalPeriksa)
    {
        $jadwalPeriksa->delete();
        return redirect()->route('jadwal-periksa.index')->with('success', 'Jadwal Periksa berhasil dihapus.');
    }
}
