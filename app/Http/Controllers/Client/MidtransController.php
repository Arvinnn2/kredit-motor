<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Angsuran;
use App\Models\PengajuanKredit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class MidtransController extends Controller
{
    private function setupMidtrans()
    {
        Config::$serverKey    = config('midtrans.server_key');
        Config::$clientKey    = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized  = config('midtrans.is_sanitized');
        Config::$is3ds        = config('midtrans.is_3ds');
    }

    public function bayarDP(PengajuanKredit $pengajuan)
    {
        $this->setupMidtrans();
        $pelanggan = Auth::user()->pelanggan;
        abort_if(!$pelanggan || $pengajuan->id_pelanggan !== $pelanggan->id, 403);
        abort_if($pengajuan->status_pengajuan !== 'Diterima', 403);

        $orderId = 'DP-' . $pengajuan->id . '-' . time();
        $params  = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => (int) $pengajuan->dp,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email'      => Auth::user()->email,
                'phone'      => $pelanggan->no_telp ?? '08000000000',
            ],
            'item_details' => [[
                'id'       => 'DP-' . $pengajuan->id,
                'price'    => (int) $pengajuan->dp,
                'quantity' => 1,
                'name'     => 'DP Kredit: ' . ($pengajuan->motor->nama_motor ?? 'Motor'),
            ]],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
        } catch (\Exception $e) {
            Log::error('Midtrans error: ' . $e->getMessage());
            return redirect()->route('client.pengajuan.show', $pengajuan)
                ->with('error', 'Gagal menghubungi Midtrans. Coba lagi.');
        }

        return view('client.pembayaran.dp', compact('pengajuan', 'snapToken'));
    }

    public function bayarAngsuran(Angsuran $angsuran)
    {
        $this->setupMidtrans();
        $pelanggan = Auth::user()->pelanggan;
        $pengajuan = $angsuran->pengajuanKredit;
        abort_if(!$pelanggan || $pengajuan->id_pelanggan !== $pelanggan->id, 403);
        abort_if($angsuran->tgl_bayar !== null, 403);

        $orderId = 'ANG-' . $angsuran->id . '-' . time();
        $params  = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => (int) $angsuran->total_bayar,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email'      => Auth::user()->email,
                'phone'      => $pelanggan->no_telp ?? '08000000000',
            ],
            'item_details' => [[
                'id'       => 'ANG-' . $angsuran->id,
                'price'    => (int) $angsuran->total_bayar,
                'quantity' => 1,
                'name'     => 'Angsuran ke-' . $angsuran->angsuran_ke . ': ' . ($pengajuan->motor->nama_motor ?? 'Motor'),
            ]],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
        } catch (\Exception $e) {
            Log::error('Midtrans error: ' . $e->getMessage());
            return redirect()->route('client.angsuran.index')
                ->with('error', 'Gagal menghubungi Midtrans. Coba lagi.');
        }

        return view('client.pembayaran.angsuran', compact('angsuran', 'pengajuan', 'snapToken'));
    }

    public function webhook(Request $request)
    {
        $this->setupMidtrans();

        try {
            $notif = new Notification();
        } catch (\Exception $e) {
            Log::error('Midtrans webhook error: ' . $e->getMessage());
            return response()->json(['status' => 'error'], 400);
        }

        $orderId           = $notif->order_id;
        $transactionStatus = $notif->transaction_status;
        $fraudStatus       = $notif->fraud_status ?? null;
        $paymentType       = $notif->payment_type ?? 'unknown';

        Log::info("Webhook: $orderId | $transactionStatus | $fraudStatus");

        $sukses = match($transactionStatus) {
            'capture'    => $fraudStatus === 'accept',
            'settlement' => true,
            'success'    => true,
            default      => false,
        };

        if (!$sukses) {
            return response()->json(['status' => 'ignored']);
        }

        $parts  = explode('-', $orderId);
        $prefix = $parts[0] ?? '';
        $id     = (int) ($parts[1] ?? 0);

        if ($prefix === 'DP' && $id) {
            $pengajuan = PengajuanKredit::find($id);
            if ($pengajuan && in_array($pengajuan->status_pengajuan, ['Diterima'])) {
                $pengajuan->update([
                    'status_pengajuan'            => 'DP Dibayar',
                    'keterangan_status_pengajuan' => 'DP dibayar via Midtrans (' . $paymentType . '). Menunggu verifikasi admin.',
                ]);
                Log::info("Pengajuan $id → DP Dibayar");
            }
        } elseif ($prefix === 'ANG' && $id) {
            $angsuran = Angsuran::find($id);
            if ($angsuran && !$angsuran->tgl_bayar) {
                $angsuran->update([
                    'tgl_bayar'  => now()->toDateString(),
                    'keterangan' => 'Dibayar via Midtrans (' . $paymentType . ')',
                ]);
                Log::info("Angsuran $id → Lunas");

                // Cek semua lunas
                $pengajuan  = $angsuran->pengajuanKredit;
                $total      = $pengajuan->angsuran()->count();
                $sudahLunas = $pengajuan->angsuran()->whereNotNull('tgl_bayar')->count();
                if ($total > 0 && $total === $sudahLunas) {
                    $pengajuan->update(['status_pengajuan' => 'Selesai']);
                    Log::info("Pengajuan {$pengajuan->id} → Selesai");
                }
            }
        }

        return response()->json(['status' => 'ok']);
    }

    public function finish(Request $request)
    {
        $parts  = explode('-', $request->order_id ?? '');
        $prefix = $parts[0] ?? '';
        $id     = (int) ($parts[1] ?? 0);

        if ($prefix === 'DP' && $id) {
            return redirect()->route('client.pengajuan.show', $id)
                ->with('success', 'Pembayaran DP berhasil! Menunggu verifikasi admin.');
        }
        return redirect()->route('client.angsuran.index')
            ->with('success', 'Pembayaran angsuran berhasil!');
    }

    public function unfinish(Request $request)
    {
        return redirect()->route('client.pengajuan.index')
            ->with('error', 'Pembayaran belum selesai. Silakan coba lagi.');
    }

    public function error(Request $request)
    {
        return redirect()->route('client.pengajuan.index')
            ->with('error', 'Terjadi kesalahan saat pembayaran. Silakan coba lagi.');
    }
}