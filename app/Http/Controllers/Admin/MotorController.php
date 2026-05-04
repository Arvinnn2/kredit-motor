<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\JenisMotor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MotorController extends Controller
{
    public function index()
    {
        $motor = Motor::with('jenisMotor')->latest()->paginate(10);
        return view('admin.motor.index', compact('motor'));
    }

    public function create()
    {
        $jenisMotor = JenisMotor::all();
        return view('admin.motor.create', compact('jenisMotor'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk'       => 'required|string|max:50',
            'nama_motor' => 'required|string|max:100',
            'idjenis'    => 'required|exists:jenis_motor,id',
            'harga_jual' => 'required|integer',
            'stok'       => 'required|integer|min:0',
        ]);

        $data = $request->except(['foto1', 'foto2', 'foto3']);

        foreach (['foto1', 'foto2', 'foto3'] as $foto) {
            if ($request->hasFile($foto)) {
                $data[$foto] = $request->file($foto)->store('motor', 'public');
            }
        }

        Motor::create($data);
        return redirect()->route('admin.motor.index')->with('success', 'Motor berhasil ditambahkan.');
    }

    public function show(Motor $motor)
    {
        return view('admin.motor.show', compact('motor'));
    }

    public function edit(Motor $motor)
    {
        $jenisMotor = JenisMotor::all();
        return view('admin.motor.edit', compact('motor', 'jenisMotor'));
    }

    public function update(Request $request, Motor $motor)
    {
        $request->validate([
            'merk'       => 'required|string|max:50',
            'nama_motor' => 'required|string|max:100',
            'idjenis'    => 'required|exists:jenis_motor,id',
            'harga_jual' => 'required|integer',
            'stok'       => 'required|integer|min:0',
        ]);

        $data = $request->except(['foto1', 'foto2', 'foto3']);

        foreach (['foto1', 'foto2', 'foto3'] as $foto) {
            if ($request->hasFile($foto)) {
                if ($motor->$foto) Storage::disk('public')->delete($motor->$foto);
                $data[$foto] = $request->file($foto)->store('motor', 'public');
            }
        }

        $motor->update($data);
        return redirect()->route('admin.motor.index')->with('success', 'Motor berhasil diupdate.');
    }

    public function destroy(Motor $motor)
    {
        foreach (['foto1', 'foto2', 'foto3'] as $foto) {
            if ($motor->$foto) Storage::disk('public')->delete($motor->$foto);
        }
        $motor->delete();
        return redirect()->route('admin.motor.index')->with('success', 'Motor berhasil dihapus.');
    }
}