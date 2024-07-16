<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $dokters = Dokter::with('spesialisasi')->get();
        return view('landing.index', compact('dokters'));
    }
}
