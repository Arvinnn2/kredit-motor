@extends('layouts.client')
@section('title', 'Bayar DP — ' . $pengajuan->motor->nama_motor)

@section('content')
<div class="mb-4">
  <a href="{{ route('client.pengajuan.show', $pengajuan) }}"
     style="font-size:13px;color:#6b7280;text-decoration:none;">
    <i class="bi bi-arrow-left me-1"></i> Kembali ke Detail Pengajuan
  </a>
</div>

<div style="max-width:520px;margin:0 auto;">
  <div class="page-title mb-1">Pembayaran Down Payment</div>
  <div class="page-sub mb-4">Selesaikan pembayaran DP untuk melanjutkan proses kredit</div>

  {{-- Info Tagihan --}}
  <div class="card mb-3">
    <div class="card-body">
      <div style="display:flex;align-items:center;gap:16px;margin-bottom:20px;">
        @if($pengajuan->motor->foto1)
          <img src="{{ asset('storage/'.$pengajuan->motor->foto1) }}"
               style="width:72px;height:56px;object-fit:cover;border-radius:10px;border:1px solid #e5e7eb;">
        @else
          <div style="width:72px;height:56px;background:#f4f6fb;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:28px;">🏍️</div>
        @endif
        <div>
          <div style="font-weight:700;font-size:15px;color:#0d0f1a;">{{ $pengajuan->motor->nama_motor }}</div>
          <div style="font-size:12px;color:#6b7280;">{{ $pengajuan->motor->merk }}</div>
        </div>
      </div>

      <div class="row g-3">
        <div class="col-6">
          <div style="font-size:11px;color:#6b7280;margin-bottom:2px;">Harga Motor</div>
          <div style="font-weight:600;">Rp {{ number_format($pengajuan->harga_cash, 0, ',', '.') }}</div>
        </div>
        <div class="col-6">
          <div style="font-size:11px;color:#6b7280;margin-bottom:2px;">Tenor Cicilan</div>
          <div style="font-weight:600;">{{ $pengajuan->jenisCicilan->lama_cicilan }} bulan</div>
        </div>
        <div class="col-6">
          <div style="font-size:11px;color:#6b7280;margin-bottom:2px;">Cicilan/Bulan</div>
          <div style="font-weight:600;">Rp {{ number_format($pengajuan->cicilan_perbulan + $pengajuan->biaya_asuransi_perbulan, 0, ',', '.') }}</div>
        </div>
        <div class="col-6">
          <div style="font-size:11px;color:#6b7280;margin-bottom:2px;">Mulai Angsuran</div>
          <div style="font-weight:600;">{{ now()->addMonth()->format('F Y') }}</div>
        </div>
      </div>

      {{-- DP Highlight --}}
      <div style="background:#f0f4ff;border:1px solid #d6e2ff;border-radius:12px;padding:20px;text-align:center;margin-top:20px;">
        <div style="font-size:12px;font-weight:600;color:#1969ff;margin-bottom:6px;">Total DP yang Harus Dibayar</div>
        <div style="font-size:32px;font-weight:800;color:#1969ff;">
          Rp {{ number_format($pengajuan->dp, 0, ',', '.') }}
        </div>
      </div>
    </div>
  </div>

  {{-- Tombol Bayar --}}
  <div class="card">
    <div class="card-body text-center">
      <div style="font-size:13px;color:#6b7280;margin-bottom:16px;">
        Pembayaran diproses melalui <strong>Midtrans</strong> yang aman dan terpercaya.
        Mendukung transfer bank, e-wallet (GoPay, OVO, DANA), QRIS, dan kartu kredit.
      </div>

      <button id="pay-button" class="btn btn-primary"
              style="padding:13px 36px;font-size:15px;font-weight:700;width:100%;border-radius:12px;">
        <i class="bi bi-credit-card me-2"></i>Bayar DP Sekarang
      </button>

      <div style="font-size:11px;color:#9ca3af;margin-top:12px;">
        <i class="bi bi-shield-lock me-1"></i>
        Transaksi dijamin aman dengan enkripsi SSL 256-bit
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
  document.getElementById('pay-button').onclick = function() {
    snap.pay('{{ $snapToken }}', {
      onSuccess: function(result) {
        window.location.href = '{{ route('midtrans.finish') }}?order_id=' + result.order_id;
      },
      onPending: function(result) {
        alert('Pembayaran pending. Selesaikan pembayaran sesuai instruksi.');
      },
      onError: function(result) {
        alert('Pembayaran gagal. Silakan coba lagi.');
      },
      onClose: function() {
        // user tutup popup tanpa bayar — biarkan saja di halaman ini
      }
    });
  };
</script>
@endpush