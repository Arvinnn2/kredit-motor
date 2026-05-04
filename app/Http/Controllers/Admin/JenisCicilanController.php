<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisCicilan;
use Illuminate\Http\Request;

class JenisCicilanController extends Controller
{
    public function index()
    {
        $jenisCicilan = JenisCicilan::orderBy('lama_cicilan')->paginate(15);
        return view('admin.jenis-cicilan.index', compact('jenisCicilan'));
    }

    public function create()
    {
        return view('admin.jenis-cicilan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lama_cicilan'  => 'required|integer|min:1',
            'margin_kredit' => 'required|numeric|min:0',
        ]);

        JenisCicilan::create($request->only(['lama_cicilan', 'margin_kredit']));

        return redirect()->route('admin.jenis-cicilan.index')
            ->with('success', 'Jenis cicilan berhasil ditambahkan.');
    }

    public function edit(JenisCicilan $jenisCicilan)
    {
        return view('admin.jenis-cicilan.edit', compact('jenisCicilan'));
    }

    public function update(Request $request, JenisCicilan $jenisCicilan)
    {
        $request->validate([
            'lama_cicilan'  => 'required|integer|min:1',
            'margin_kredit' => 'required|numeric|min:0',
        ]);

        $jenisCicilan->update($request->only(['lama_cicilan', 'margin_kredit']));

        return redirect()->route('admin.jenis-cicilan.index')
            ->with('success', 'Jenis cicilan berhasil diperbarui.');
    }

    public function destroy(JenisCicilan $jenisCicilan)
    {
        $jenisCicilan->delete();
        return redirect()->route('admin.jenis-cicilan.index')
            ->with('success', 'Jenis cicilan berhasil dihapus.');
    }
}