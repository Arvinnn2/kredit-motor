@extends('layouts.client')
@section('title', $motor->nama_motor)

@section('content')
<div class="mb-3">
  <a href="{{ route('client.motor.index') }}" style="font-size:13px;color:#6b7280;text-decoration:none;">
    <i class="bi bi-arrow-left me-1"></i> Kembali ke Katalog
  </a>
</div>

<div class="row g-3">
  {{-- FOTO --}}
  <div class="col-lg-5">
    <div class="card">
      <div class="card-body">

        {{-- FOTO UTAMA --}}
        <div style="
            width:100%;
            aspect-ratio:1/1;
            background:#fff;
            display:flex;
            align-items:center;
            justify-content:center;
            border-radius:12px;
            overflow:hidden;
            border:1px solid #f1f1f1;
            margin-bottom:12px;
        ">
          @if($motor->foto1)
            <img src="{{ asset('storage/'.$motor->foto1) }}"
                style="width:100%; height:100%; object-fit:contain;">
          @else
            <div style="font-size:60px;">🏍️</div>
          @endif
        </div>

        {{-- THUMBNAIL --}}
        @php $fotos = array_filter([$motor->foto2 ?? null, $motor->foto3 ?? null]); @endphp
        @if(count($fotos) > 0)
        <div class="d-flex gap-2">
          @foreach($fotos as $f)
            <div style="
                width:70px;
                aspect-ratio:1/1;
                background:#fff;
                display:flex;
                align-items:center;
                justify-content:center;
                border-radius:8px;
                border:1px solid #e5e7eb;
                overflow:hidden;
            ">
              <img src="{{ asset('storage/'.$f) }}"
                  style="width:100%; height:100%; object-fit:contain;">
            </div>
          @endforeach
        </div>
        @endif

      </div>
    </div>
  </div>

  {{-- Detail --}}
  <div class="col-lg-7">
    <div class="card h-100">
      <div class="card-body">
        <div style="font-size:12px;font-weight:700;color:#1969ff;text-transform:uppercase;letter-spacing:.04em;margin-bottom:4px;">
          {{ $motor->merk }}
        </div>
        <div style="font-size:24px;font-weight:800;color:#0d0f1a;margin-bottom:4px;">{{ $motor->nama_motor }}</div>
        <div style="font-size:30px;font-weight:800;color:#1969ff;margin-bottom:20px;">
          Rp {{ number_format($motor->harga_jual, 0, ',', '.') }}
        </div>

        <div class="row g-2 mb-4">
          @if($motor->jenisMotor)
          <div class="col-6">
            <div style="background:#f4f6fb;border-radius:10px;padding:12px 14px;">
              <div style="font-size:11px;color:#6b7280;margin-bottom:2px;">Jenis Motor</div>
              <div style="font-weight:600;font-size:14px;">{{ $motor->jenisMotor->jenis }}</div>
            </div>
          </div>
          @endif
          @if($motor->warna)
          <div class="col-6">
            <div style="background:#f4f6fb;border-radius:10px;padding:12px 14px;">
              <div style="font-size:11px;color:#6b7280;margin-bottom:2px;">Warna</div>
              <div style="font-weight:600;font-size:14px;">{{ $motor->warna }}</div>
            </div>
          </div>
          @endif
          @if($motor->kapasitas_mesin)
          <div class="col-6">
            <div style="background:#f4f6fb;border-radius:10px;padding:12px 14px;">
              <div style="font-size:11px;color:#6b7280;margin-bottom:2px;">Kapasitas Mesin</div>
              <div style="font-weight:600;font-size:14px;">{{ $motor->kapasitas_mesin }}</div>
            </div>
          </div>
          @endif
          @if($motor->tahun_produksi)
          <div class="col-6">
            <div style="background:#f4f6fb;border-radius:10px;padding:12px 14px;">
              <div style="font-size:11px;color:#6b7280;margin-bottom:2px;">Tahun Produksi</div>
              <div style="font-weight:600;font-size:14px;">{{ $motor->tahun_produksi }}</div>
            </div>
          </div>
          @endif
          <div class="col-6">
            <div style="background:{{ $motor->stok > 0 ? '#f0fdf4' : '#fef2f2' }};border-radius:10px;padding:12px 14px;border:1px solid {{ $motor->stok > 0 ? '#bbf7d0' : '#fecaca' }};">
              <div style="font-size:11px;color:#6b7280;margin-bottom:2px;">Stok Tersedia</div>
              <div style="font-weight:700;font-size:14px;color:{{ $motor->stok > 0 ? '#16a34a' : '#dc2626' }};">
                {{ $motor->stok }} unit
              </div>
            </div>
          </div>
        </div>

        @if($motor->deskripsi_motor)
        <div style="font-size:13.5px;color:#374151;line-height:1.7;margin-bottom:20px;padding:14px;background:#f8fafc;border-radius:10px;">
          {{ $motor->deskripsi_motor }}
        </div>
        @endif

        @if($motor->stok > 0)
          <a href="{{ route('client.pengajuan.create', ['motor_id' => $motor->id]) }}"
             class="btn btn-primary w-100" style="padding:12px;font-size:15px;font-weight:700;">
            <i class="bi bi-file-earmark-plus me-2"></i>Ajukan Kredit Motor Ini
          </a>
        @else
          <button class="btn btn-secondary w-100" disabled style="padding:12px;">Stok Habis</button>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection