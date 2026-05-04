<?php

namespace App\Http\Controllers\Ceo;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::withCount('pengajuanKredit')->paginate(20);
        return view('ceo.pelanggan.index', compact('pelanggan'));
    }

    public function show(Pelanggan $pelanggan)
    {
        $pelanggan->load(['pengajuanKredit.motor', 'pengajuanKredit.jenisCicilan']);
        return view('ceo.pelanggan.show', compact('pelanggan'));
    }
}
