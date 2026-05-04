<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\PengajuanKredit;
use App\Models\Motor;
use App\Models\JenisCicilan;
use App\Models\Asuransi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    // Persentase DP berdasarkan tenor (lama_cicilan dalam bulan)
    private function persenDP(int $lamaCicilan): float
    {
        return match(true) {
            $lamaCicilan <= 12 => 25.0,
            $lamaCicilan <= 24 => 20.0,
            $lamaCicilan <= 36 => 15.0,
            default            => 10.0, // 48 bulan ke atas
        };
    }

    public function index()
    {
        $pelanggan = Auth::user()->pelanggan;

        if (!$pelanggan) {
            return redirect()->route('client.profile')
                ->with('info', 'Lengkapi profil Anda terlebih dahulu.');
        }

        $pengajuan = PengajuanKredit::where('id_pelanggan', $pelanggan->id)
            ->with(['motor', 'jenisCicilan'])
            ->latest()
            ->paginate(10);

        return view('client.pengajuan.index', compact('pengajuan'));
    }

    public function create(Request $request)
    {
        $pelanggan = Auth::user()->pelanggan;

        if (!$pelanggan) {
            return redirect()->route('client.profile')
                ->with('info', 'Lengkapi profil Anda terlebih dahulu.');
        }

        $motor        = Motor::findOrFail($request->motor_id);
        $jenisCicilan = JenisCicilan::all();
        $asuransi     = Asuransi::all();

        if ($motor->stok <= 0) {
            return redirect()->route('client.motor.index')
                ->with('error', 'Maaf, stok motor ' . $motor->nama_motor . ' sudah habis.');
        }

        // Kirim tabel persen DP ke view untuk simulasi JS
        $tabelDP = [
            12 => 25,
            24 => 20,
            36 => 15,
            48 => 10,
        ];

        return view('client.pengajuan.create', compact(
            'motor', 'jenisCicilan', 'asuransi', 'pelanggan', 'tabelDP'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_motor'         => 'required|exists:motor,id',
            'id_jenis_cicilan' => 'required|exists:jenis_cicilan,id',
            'id_asuransi'      => 'required|exists:asuransi,id',
            'url_ktp'          => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'url_kk'           => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'url_npwp'         => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'url_slip_gaji'    => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'url_foto'         => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pelanggan = Auth::user()->pelanggan;
        $motor     = Motor::findOrFail($request->id_motor);
        $cicilan   = JenisCicilan::findOrFail($request->id_jenis_cicilan);
        $asuransi  = Asuransi::findOrFail($request->id_asuransi);

        if ($motor->stok <= 0) {
            return back()->with('error', 'Maaf, stok motor sudah habis.');
        }

        // ── Hitung DP otomatis berdasarkan tenor ──────────────
        $persenDP      = $this->persenDP($cicilan->lama_cicilan);
        $dp            = round($motor->harga_jual * $persenDP / 100);

        // ── Hitung harga kredit & cicilan ─────────────────────
        $hargaKredit   = round($motor->harga_jual * (1 + $cicilan->margin_kredit / 100));
        $sisaHarga     = $hargaKredit - $dp;
        $cicilanPerBln = round($sisaHarga / $cicilan->lama_cicilan);
        $biayaAsuransi = round(($motor->harga_jual * ($asuransi->margin_asuransi / 100)) / $cicilan->lama_cicilan);

        $data = [
            'tgl_pengajuan_kredit'    => now()->toDateString(),
            'id_pelanggan'            => $pelanggan->id,
            'id_motor'                => $motor->id,
            'harga_cash'              => $motor->harga_jual,
            'dp'                      => $dp,
            'id_jenis_cicilan'        => $cicilan->id,
            'harga_kredit'            => $hargaKredit,
            'id_asuransi'             => $asuransi->id,
            'biaya_asuransi_perbulan' => $biayaAsuransi,
            'cicilan_perbulan'        => $cicilanPerBln,
            'status_pengajuan'        => 'Menunggu Konfirmasi',
        ];

        foreach (['url_ktp', 'url_kk', 'url_npwp', 'url_slip_gaji', 'url_foto'] as $file) {
            if ($request->hasFile($file)) {
                $data[$file] = $request->file($file)->store('dokumen', 'public');
            }
        }

        PengajuanKredit::create($data);

        return redirect()->route('client.pengajuan.index')
            ->with('success', 'Pengajuan kredit berhasil dikirim! Tunggu konfirmasi dari tim kami.');
    }

    public function show(PengajuanKredit $pengajuan)
    {
        $pelanggan = Auth::user()->pelanggan;
        abort_if($pengajuan->id_pelanggan !== $pelanggan->id, 403);

        $pengajuan->load(['motor', 'jenisCicilan', 'asuransi', 'angsuran', 'pengiriman']);

        return view('client.pengajuan.show', compact('pengajuan'));
    }
}