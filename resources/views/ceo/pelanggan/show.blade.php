@extends('layouts.ceo')
@section('title', 'Detail Pelanggan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h4 class="fw-bold mb-1">Detail Pelanggan</h4>
    <a href="{{ route('ceo.pelanggan.index') }}" class="text-muted" style="font-size:13px;text-decoration:none;"><i class="mdi mdi-arrow-left me-1"></i> Kembali</a>
  </div>
</div>

<div class="row g-3">
  <div class="col-lg-4">
    <div class="card" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
      <div class="card-body p-4 text-center">
        <div style="width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,#f59e0b,#fcd34d);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:30px;margin:0 auto 16px;">
          {{ strtoupper(substr($pelanggan->nama_pelanggan, 0, 1)) }}
        </div>
        <h5 class="fw-bold mb-1">{{ $pelanggan->nama_pelanggan }}</h5>
        <p class="text-muted mb-3" style="font-size:13px;">{{ $pelanggan->pekerjaan ?? 'Tidak diketahui' }}</p>
        <table class="table table-borderless text-start mb-0" style="font-size:13px;">
          <tr><td style="color:#6b7280;width:40%">Kode</td><td class="fw-medium">{{ $pelanggan->katakunci ?? '-' }}</td></tr>
          <tr><td style="color:#6b7280">Telepon</td><td class="fw-medium">{{ $pelanggan->no_telp ?? '-' }}</td></tr>
          <tr><td style="color:#6b7280">Email</td><td class="fw-medium">{{ $pelanggan->email ?? '-' }}</td></tr>
          <tr><td style="color:#6b7280">Alamat</td><td class="fw-medium">{{ $pelanggan->alamat1 ?? '-' }}</td></tr>
          <tr><td style="color:#6b7280">Kota/Prov</td><td class="fw-medium">{{ $pelanggan->kota1 ? $pelanggan->kota1.', '.($pelanggan->propinsi1 ?? '') : '-' }}</td></tr>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-8">
    <div class="card" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
      <div class="card-body p-4">
        <h6 class="fw-bold mb-3">Riwayat Pengajuan Kredit ({{ $pelanggan->pengajuanKredit->count() }})</h6>
        @forelse($pelanggan->pengajuanKredit as $pk)
        <div class="p-3 mb-3 rounded" style="background:#f9fafb;border:1px solid #e8ecf1;">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <div class="fw-semibold" style="font-size:14px;">{{ $pk->motor->nama_motor ?? '-' }}</div>
              <div class="text-muted" style="font-size:12px;">{{ \Carbon\Carbon::parse($pk->tgl_pengajuan_kredit)->format('d/m/Y') }} · {{ $pk->jenisCicilan->lama_cicilan ?? '-' }} bulan</div>
            </div>
            @php
              $sc = ['Diproses'=>'#ede9fe,#7c3aed','Selesai'=>'#d1fae5,#059669','Menunggu Konfirmasi'=>'#fef3c7,#d97706','Diterima'=>'#d1fae5,#059669','DP Dibayar'=>'#dbeafe,#1d4ed8','Dibatalkan Penjual'=>'#fee2e2,#dc2626'];
              [$bg,$tc] = explode(',', $sc[$pk->status_pengajuan] ?? '#f3f4f6,#374151');
            @endphp
            <span class="badge" style="background:{{ $bg }};color:{{ $tc }};border-radius:20px;padding:4px 10px;font-size:11px;">{{ $pk->status_pengajuan }}</span>
          </div>
          <div class="d-flex gap-4 mt-2">
            <div><span style="font-size:11px;color:#9ca3af;">DP</span><br><strong style="font-size:13px;">Rp {{ number_format($pk->dp, 0, ',', '.') }}</strong></div>
            <div><span style="font-size:11px;color:#9ca3af;">Harga Kredit</span><br><strong style="font-size:13px;color:#b45309;">Rp {{ number_format($pk->harga_kredit, 0, ',', '.') }}</strong></div>
            <div><span style="font-size:11px;color:#9ca3af;">Cicilan/bln</span><br><strong style="font-size:13px;">Rp {{ number_format($pk->cicilan_perbulan, 0, ',', '.') }}</strong></div>
          </div>
        </div>
        @empty
        <div class="text-center py-4 text-muted" style="font-size:13px;">Belum ada pengajuan kredit</div>
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection
