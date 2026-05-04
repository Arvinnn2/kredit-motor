<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $hero = HeroSetting::first();
        return view('admin.hero.index', compact('hero'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'judul'      => 'required|string|max:100',
            'subjudul'   => 'nullable|string|max:150',
            'deskripsi'  => 'nullable|string|max:500',
            'teks_tombol'=> 'nullable|string|max:50',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $hero = HeroSetting::firstOrNew(['id' => 1]);

        $data = $request->only(['judul', 'subjudul', 'deskripsi', 'teks_tombol']);

        if ($request->hasFile('gambar')) {
            if ($hero->gambar) {
                Storage::disk('public')->delete($hero->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('hero', 'public');
        }

        $hero->fill($data)->save();

        return redirect()->route('admin.hero.index')
            ->with('success', 'Banner hero berhasil diperbarui.');
    }
}
