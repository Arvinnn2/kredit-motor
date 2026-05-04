<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengiriman::with('pengajuanKredit.pelanggan');

        if ($request->status) {
            $query->where('status_kirim', $request->status);
        }
        if ($request->search) {
            $query->whereHas('pengajuanKredit.pelanggan', function ($q) use ($request) {
                $q->where('nama_pelanggan', 'like', '%' . $request->search . '%');
            });
        }

        $pengiriman = $query->latest()->paginate(15);
        return view('marketing.pengiriman.index', compact('pengiriman'));
    }

    public function show(Pengiriman $pengiriman)
    {
        $pengiriman->load('pengajuanKredit.pelanggan');
        return view('marketing.pengiriman.show', compact('pengiriman'));
    }

    public function update(Request $request, Pengiriman $pengiriman)
    {
        $request->validate([
            'status_kirim' => 'required|in:Sedang Dikirim,Tiba Di Tujuan',
            'nama_kurir'   => 'nullable|string|max:60',
            'telpon_kurir' => 'nullable|string|max:20',
            'no_invoice'   => 'nullable|string|max:50',
            'tgl_kirim'    => 'nullable|date',
            'tgl_tiba'     => 'nullable|date',
            'keterangan'   => 'nullable|string|max:255',
            'bukti_foto'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except(['bukti_foto', '_token', '_method']);

        if ($request->hasFile('bukti_foto')) {
            $data['bukti_foto'] = $request->file('bukti_foto')->store('pengiriman', 'public');
        }

        $pengiriman->update($data);

        return redirect()->route('marketing.pengiriman.show', $pengiriman)
            ->with('success', 'Data pengiriman berhasil diperbarui.');
    }
}
