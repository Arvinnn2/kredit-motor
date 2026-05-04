<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use App\Models\Asuransi;
use Illuminate\Http\Request;

class AsuransiController extends Controller
{
    public function index()
    {
        $asuransi = Asuransi::paginate(15);
        return view('marketing.asuransi.index', compact('asuransi'));
    }

    public function create()
    {
        return view('marketing.asuransi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_asuransi'   => 'required|string|max:100',
            'margin_asuransi' => 'required|numeric|min:0|max:100',
            'keterangan'      => 'nullable|string',
        ]);

        Asuransi::create($request->all());

        return redirect()->route('marketing.asuransi.index')
            ->with('success', 'Data asuransi berhasil ditambahkan.');
    }

    public function edit(Asuransi $asuransi)
    {
        return view('marketing.asuransi.edit', compact('asuransi'));
    }

    public function update(Request $request, Asuransi $asuransi)
    {
        $request->validate([
            'nama_asuransi'   => 'required|string|max:100',
            'margin_asuransi' => 'required|numeric|min:0|max:100',
            'keterangan'      => 'nullable|string',
        ]);

        $asuransi->update($request->all());

        return redirect()->route('marketing.asuransi.index')
            ->with('success', 'Data asuransi berhasil diperbarui.');
    }

    public function destroy(Asuransi $asuransi)
    {
        $asuransi->delete();
        return redirect()->route('marketing.asuransi.index')
            ->with('success', 'Data asuransi berhasil dihapus.');
    }
}
