@extends('layouts.client')
@section('title', 'Katalog Motor')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <div class="page-title">Katalog Motor</div>
    <div class="page-sub">Pilih motor impian Anda dan ajukan kredit sekarang</div>
  </div>
</div>

{{-- Filter --}}
<div class="card mb-4">
  <div class="card-body" style="padding:16px 20px !important;">
    <form method="GET" class="d-flex gap-2 flex-wrap align-items-end">
      <div style="flex:1;min-width:200px;">
        <label class="form-label mb-1">Cari Motor</label>
        <input type="text" name="search" class="form-control"
               placeholder="Nama motor atau merk..."
               value="{{ request('search') }}">
      </div>
      <div style="min-width:180px;">
        <label class="form-label mb-1">Jenis Motor</label>
        <select name="jenis" class="form-select">
          <option value="">Semua Jenis</option>
          @foreach($jenisMotor as $j)
            <option value="{{ $j->id }}" {{ request('jenis') == $j->id ? 'selected' : '' }}>
              {{ $j->jenis }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-search me-1"></i> Cari
        </button>
        @if(request()->hasAny(['search','jenis']))
          <a href="{{ route('client.motor.index') }}" class="btn btn-outline-secondary">Reset</a>
        @endif
      </div>
    </form>
  </div>
</div>

{{-- GRID --}}
<div class="row g-3">
  @forelse($motor as $m)
  <div class="col-xl-3 col-lg-4 col-md-6">

    <div class="card h-100"
         style="border-radius:14px; overflow:hidden; transition:.2s;"
         onmouseover="this.style.boxShadow='0 8px 28px rgba(0,0,0,.1)';this.style.transform='translateY(-3px)'"
         onmouseout="this.style.boxShadow='';this.style.transform=''">

      {{-- FOTO (KONSISTEN) --}}
      <div style="
          width:100%;
          aspect-ratio:1/1;
          background:#fff;
          display:flex;
          align-items:center;
          justify-content:center;
          overflow:hidden;
          border-bottom:1px solid #f1f1f1;
      ">
        @if($m->foto1)
          <img src="{{ asset('storage/'.$m->foto1) }}"
               style="width:100%; height:100%; object-fit:contain;">
        @else
          <div style="font-size:50px;">🏍️</div>
        @endif
      </div>

      <div class="card-body d-flex flex-column" style="padding:16px;">

        {{-- MERK --}}
        <div style="font-size:11px;font-weight:700;color:#1969ff;text-transform:uppercase;letter-spacing:.04em;margin-bottom:4px;">
          {{ $m->merk }}@if($m->jenisMotor) · {{ $m->jenisMotor->jenis }}@endif
        </div>

        {{-- NAMA --}}
        <div style="font-weight:700;font-size:15px;margin-bottom:6px;color:#0d0f1a;">
          {{ $m->nama_motor }}
        </div>

        {{-- HARGA --}}
        <div style="font-size:18px;font-weight:800;color:#1969ff;margin-bottom:10px;">
          Rp {{ number_format($m->harga_jual, 0, ',', '.') }}
        </div>

        {{-- STOK --}}
        <div class="mb-3">
          @if($m->stok > 0)
            <span class="badge bg-success" style="font-size:10px;">Stok: {{ $m->stok }}</span>
          @else
            <span class="badge bg-danger" style="font-size:10px;">Stok Habis</span>
          @endif
        </div>

        {{-- BUTTON (SELALU DI BAWAH) --}}
        <div class="mt-auto">
          <a href="{{ route('client.motor.show', $m) }}"
             class="btn btn-outline-primary btn-sm w-100"
             style="border-radius:8px;">
            Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
          </a>
        </div>

      </div>
    </div>

  </div>
  @empty
  <div class="col-12">
    <div class="card">
      <div class="card-body text-center py-5 text-muted">
        <div style="font-size:48px;margin-bottom:12px;">🔍</div>
        <div style="font-weight:600;margin-bottom:6px;">Motor tidak ditemukan</div>
        <div style="font-size:13px;">Coba ubah kata kunci atau filter pencarian</div>
        <a href="{{ route('client.motor.index') }}" class="btn btn-outline-primary btn-sm mt-3">Reset Pencarian</a>
      </div>
    </div>
  </div>
  @endforelse
</div>

@if($motor->hasPages())
<div class="mt-4">{{ $motor->appends(request()->query())->links() }}</div>
@endif
@endsection