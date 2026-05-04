@extends('layouts.client')
@section('title', 'Bayar Angsuran ke-' . $angsuran->angsuran_ke)

@section('content')
<div class="mb-4">
  <a href="{{ route('client.angsuran.index') }}"
     style="font-size:13px;color:#6b7280;text-decoration:none;">
    <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Angsuran
  </a>
</div>

<div style="max-width:520px;margin:0 auto;">
  <div class="page-title mb-1">Bayar Angsuran</div>
  <div class="page-sub mb-4">Angsuran ke-{{ $angsuran->angsuran_ke }} dari {{ $pengajuan->jenisCicilan->lama_cicilan }} bulan</div>

  {{-- Progress Bar Angsuran --}}
  @php
    $totalAngsuran  = $pengajuan->angsuran()->count();
    $sudahLunas     = $pengajuan->angsuran()->whereNotNull('tgl_bayar')->count();
    $persen         = $totalAngsuran > 0 ? round(($sudahLunas / $totalAngsuran) * 100) : 0;
  @endphp
  <div class="card mb-3">
    <div class="card-body">
      <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px;">
        <div style="font-size:13px;font-weight:600;color:#0d0f1a;">Progress Cicilan</div>
        <div style="font-size:12px;color:#1969ff;font-weight:700;">{{ $sudahLunas }}/{{ $totalAngsuran }} bulan</div>
      </div>
      <div style="height:8px;background:#e5e7eb;border-radius:100px;overflow:hidden;">
        <div style="height:100%;background:linear-gradient(90deg,#1969ff,#6ea8fe);width:{{ $persen }}%;border-radius:100px;transition:width .4s;"></div>
      </div>
    </div>
  </div>

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
          <div style="font-size:12px;color:#6b7280;">Angsuran ke-{{ $angsuran->angsuran_ke }}</div>
        </div>
      </div>

      <div class="row g-3">
        <div class="col-6">
          <div style="font-size:11px;color:#6b7280;margin-bottom:2px;">Cicilan Pokok</div>
          <div style="font-weight:600;">Rp {{ number_format($pengajuan->cicilan_perbulan, 0, ',', '.') }}</div>
        </div>
        <div class="col-6">
          <div style="font-size:11px;color:#6b7280;margin-bottom:2px;">Biaya Asuransi</div>
          <div style="font-weight:600;">Rp {{ number_format($pengajuan->biaya_asuransi_perbulan, 0, ',', '.') }}</div>
        </div>
      </div>

      {{-- Total Highlight --}}
      <div style="background:#f0f4ff;border:1px solid #d6e2ff;border-radius:12px;padding:20px;text-align:center;margin-top:20px;">
        <div style="font-size:12px;font-weight:600;color:#1969ff;margin-bottom:6px;">Total Bayar Bulan Ini</div>
        <div style="font-size:32px;font-weight:800;color:#1969ff;">
          Rp {{ number_format($angsuran->total_bayar, 0, ',', '.') }}
        </div>
        <div style="font-size:11px;color:#9ca3af;margin-top:4px;">
          {{ $angsuran->keterangan }}
        </div>
      </div>
    </div>
  </div>

  {{-- Tombol Bayar --}}
  <div class="card">
    <div class="card-body text-center">
      <div style="font-size:13px;color:#6b7280;margin-bottom:16px;">
        Pembayaran diproses melalui <strong>Midtrans</strong>.
        Mendukung transfer bank, e-wallet (GoPay, OVO, DANA), QRIS, dan kartu kredit.
      </div>

      <button id="pay-button" class="btn btn-primary"
              style="padding:13px 36px;font-size:15px;font-weight:700;width:100%;border-radius:12px;">
        <i class="bi bi-credit-card me-2"></i>Bayar Sekarang
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
        // user tutup tanpa bayar
      }
    });
  };
</script>
@endpush