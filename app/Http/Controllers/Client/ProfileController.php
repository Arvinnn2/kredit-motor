<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $pelanggan = Auth::user()->pelanggan ?? new Pelanggan();
        return view('client.profile.edit', compact('pelanggan'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'no_telp'        => 'required|string|max:15',
            'alamat1'        => 'required|string',
            'kota1'          => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pelanggan', 'public');
        }

        Pelanggan::updateOrCreate(
            ['email' => $user->email],
            array_merge($data, ['email' => $user->email])
        );

        return redirect()->route('client.profile')
            ->with('success', 'Profil berhasil disimpan.');
    }
}