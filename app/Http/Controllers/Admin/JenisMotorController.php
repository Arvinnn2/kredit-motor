<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisMotor;
use Illuminate\Http\Request;

class JenisMotorController extends Controller
{
    public function index()
    {
        $jenisMotor = JenisMotor::withCount('motor')->latest()->paginate(10);
        return view('admin.jenis-motor.index', compact('jenisMotor'));
    }

    public function create()
    {
        return view('admin.jenis-motor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk'  => 'required|string|max:50',
            'jenis' => 'required|string',
        ]);
        JenisMotor::create($request->all());
        return redirect()->route('admin.jenis-motor.index')->with('success', 'Jenis motor berhasil ditambahkan.');
    }

    public function edit(JenisMotor $jenisMotor)
    {
        return view('admin.jenis-motor.edit', compact('jenisMotor'));
    }

    public function update(Request $request, JenisMotor $jenisMotor)
    {
        $request->validate([
            'merk'  => 'required|string|max:50',
            'jenis' => 'required|string',
        ]);
        $jenisMotor->update($request->all());
        return redirect()->route('admin.jenis-motor.index')->with('success', 'Jenis motor berhasil diupdate.');
    }

    public function destroy(JenisMotor $jenisMotor)
    {
        $jenisMotor->delete();
        return redirect()->route('admin.jenis-motor.index')->with('success', 'Jenis motor berhasil dihapus.');
    }
}