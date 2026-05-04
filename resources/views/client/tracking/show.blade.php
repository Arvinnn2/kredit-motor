@extends('layouts.client')
@section('title', 'Tracking Pengiriman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <div class="page-title">Tracking Pengiriman</div>
    <div class="page-sub">Motor: {{ $pengajuan->motor->nama_motor ?? '' }}</div>
  </div>
  <a href="{{ route('client.pengajuan.show', $pengajuan) }}" class="btn btn-outline-secondary btn-sm">
    <i class="bi bi-arrow-left me-1"></i> Kembali
  </a>
</div>

@if(!$pengiriman)
<div class="card text-center py-5" style="border-radius:14px;border:1px solid #e8ecf1;">
  <h5 class="fw-bold mt-3">Belum Ada Data Pengiriman</h5>
  <p class="text-muted">Pengiriman motor Anda belum diproses.</p>
</div>
@else

<div class="card mb-4" style="border-radius:14px;border:1px solid #e8ecf1;overflow:hidden;">
  
  {{-- HEADER --}}
  <div style="background:linear-gradient(135deg,#1969ff,#6366f1);padding:24px;color:#fff;">
    <div style="font-size:13px;opacity:.8;">No. Invoice</div>
    <div style="font-size:20px;font-weight:800;">{{ $pengiriman->no_invoice }}</div>
  </div>

  <div class="card-body p-4">

    @php $tiba = $pengiriman->status_kirim === 'Tiba Di Tujuan'; @endphp

    {{-- TIMELINE --}}
    <div class="d-flex align-items-start mb-4" style="position:relative;">

      {{-- LINE GLOBAL --}}
      <div style="
        position:absolute;
        top:20px;
        left:10%;
        width:80%;
        height:3px;
        background:#e5e7eb;
        z-index:0;
      "></div>

      {{-- STEP 1 --}}
      <div style="flex:1;text-align:center;z-index:1;">
        <div style="width:40px;height:40px;border-radius:50%;background:#d1fae5;border:3px solid #059669;display:flex;align-items:center;justify-content:center;margin:auto;">
          ✓
        </div>
        <div style="font-size:12px;font-weight:600;color:#059669;margin-top:6px;">Kredit Aktif</div>
        <div style="font-size:11px;color:#9ca3af;">Terverifikasi</div>
      </div>

      {{-- STEP 2 --}}
      <div style="flex:1;text-align:center;z-index:1;">
        <div style="width:40px;height:40px;border-radius:50%;
          background:{{ $tiba ? '#d1fae5' : '#dbeafe' }};
          border:3px solid {{ $tiba ? '#059669' : '#1969ff' }};
          display:flex;align-items:center;justify-content:center;margin:auto;">
          {{ $tiba ? '✓' : '...' }}
        </div>
        <div style="font-size:12px;font-weight:600;color:{{ $tiba ? '#059669' : '#1969ff' }};margin-top:6px;">
          Sedang Dikirim
        </div>
      </div>

      {{-- STEP 3 --}}
      <div style="flex:1;text-align:center;z-index:1;">
        <div style="width:40px;height:40px;border-radius:50%;
          background:{{ $tiba ? '#d1fae5' : '#f3f4f6' }};
          border:3px solid {{ $tiba ? '#059669' : '#d1d5db' }};
          display:flex;align-items:center;justify-content:center;margin:auto;">
          {{ $tiba ? '✓' : '...' }}
        </div>
        <div style="font-size:12px;font-weight:600;color:{{ $tiba ? '#059669' : '#9ca3af' }};margin-top:6px;">
          Tiba di Tujuan
        </div>
      </div>

    </div>

    {{-- STATUS --}}
    <div class="alert text-center" style="background:#dbeafe;border:none;border-radius:12px;color:#1e40af;font-weight:600;">
      Motor Anda sedang dalam perjalanan menuju alamat Anda.
    </div>

    {{-- CATATAN (BALIK + RAPIH) --}}
    @if($pengiriman->keterangan)
    <div class="mt-3" style="background:#fef3c7;border-radius:10px;padding:14px;">
      <div style="font-size:11px;font-weight:600;color:#92400e;margin-bottom:6px;">
        Catatan Pengiriman
      </div>
      <div style="font-size:13px;color:#78350f;">
        {{ $pengiriman->keterangan }}
      </div>
    </div>
    @endif

    {{-- FOTO --}}
    @if($pengiriman->bukti_foto)
    <div class="mt-3 text-center">
      <div style="font-size:11px;color:#9ca3af;font-weight:600;margin-bottom:8px;">
        Bukti Pengiriman
      </div>

      <div style="
        width:260px;
        aspect-ratio:1/1;
        margin:auto;
        border-radius:12px;
        overflow:hidden;
        border:1px solid #e5e7eb;
        display:flex;
        align-items:center;
        justify-content:center;
      ">
        <img src="{{ Storage::url($pengiriman->bukti_foto) }}"
             style="width:100%;height:100%;object-fit:contain;">
      </div>
    </div>
    @endif

  </div>
</div>
@endif
@endsection