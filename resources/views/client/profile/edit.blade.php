@extends('layouts.client')
@section('title', 'Profil Saya')

@section('content')
<div class="mb-4">
  <div class="page-title">Profil Saya</div>
  <div class="page-sub">Lengkapi data diri agar bisa mengajukan kredit motor</div>
</div>

@if(session('info'))
<div class="alert alert-info alert-dismissible fade show mb-4">
  <i class="bi bi-info-circle me-2"></i>{{ session('info') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row g-3">
  {{-- Avatar Card --}}
  <div class="col-lg-3">
    <div class="card text-center">
      <div class="card-body" style="padding:28px 20px !important;">
        @if(isset($pelanggan->foto) && $pelanggan->foto)
          <img src="{{ asset('storage/'.$pelanggan->foto) }}"
               style="width:90px;height:90px;border-radius:50%;object-fit:cover;border:3px solid #e5e7eb;margin-bottom:12px;">
        @else
          <div style="width:90px;height:90px;border-radius:50%;background:linear-gradient(135deg,#1969ff,#6ea8fe);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:32px;margin:0 auto 12px;">
            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
          </div>
        @endif
        <div style="font-weight:700;font-size:15px;color:#0d0f1a;">{{ auth()->user()->name }}</div>
        <div style="font-size:12px;color:#6b7280;margin-top:3px;">{{ auth()->user()->email }}</div>
        <div style="margin-top:10px;">
          <span style="font-size:11px;font-weight:700;padding:4px 10px;border-radius:6px;background:#eff4ff;color:#1969ff;border:1px solid #d6e2ff;">
            Pelanggan
          </span>
        </div>
      </div>
    </div>
  </div>

  {{-- Form --}}
  <div class="col-lg-9">
    <div class="card">
      <div class="card-header">Data Diri</div>
      <div class="card-body">
        <form action="{{ route('client.profile.update') }}" method="POST" enctype="multipart/form-data">
          @csrf @method('PUT')
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
              <input type="text" name="nama_pelanggan"
                     class="form-control @error('nama_pelanggan') is-invalid @enderror"
                     value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan ?? '') }}"
                     placeholder="Nama lengkap sesuai KTP">
              @error('nama_pelanggan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">No. Telepon <span class="text-danger">*</span></label>
              <input type="text" name="no_telp"
                     class="form-control @error('no_telp') is-invalid @enderror"
                     value="{{ old('no_telp', $pelanggan->no_telp ?? '') }}"
                     placeholder="08xxxxxxxxxx">
              @error('no_telp')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12">
              <label class="form-label">Alamat <span class="text-danger">*</span></label>
              <textarea name="alamat1" rows="2"
                        class="form-control @error('alamat1') is-invalid @enderror"
                        placeholder="Jl. Contoh No. 1, RT/RW ...">{{ old('alamat1', $pelanggan->alamat1 ?? '') }}</textarea>
              @error('alamat1')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-4">
              <label class="form-label">Kota <span class="text-danger">*</span></label>
              <input type="text" name="kota1"
                     class="form-control @error('kota1') is-invalid @enderror"
                     value="{{ old('kota1', $pelanggan->kota1 ?? '') }}"
                     placeholder="Jakarta, Bandung...">
              @error('kota1')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-4">
              <label class="form-label">Provinsi</label>
              <input type="text" name="propinsi1" class="form-control"
                     value="{{ old('propinsi1', $pelanggan->propinsi1 ?? '') }}"
                     placeholder="Jawa Barat...">
            </div>

            <div class="col-md-4">
              <label class="form-label">Kode Pos</label>
              <input type="text" name="kodepos1" class="form-control"
                     value="{{ old('kodepos1', $pelanggan->kodepos1 ?? '') }}"
                     placeholder="40xxx">
            </div>

            <div class="col-md-6">
              <label class="form-label">Foto Profil</label>
              @if(isset($pelanggan->foto) && $pelanggan->foto)
              <div class="mb-2 d-flex align-items-center gap-2">
                <img src="{{ asset('storage/'.$pelanggan->foto) }}"
                     style="width:44px;height:44px;border-radius:50%;object-fit:cover;border:1px solid #e5e7eb;">
                <span style="font-size:12px;color:#6b7280;">Foto saat ini</span>
              </div>
              @endif
              <input type="file" name="foto" class="form-control" accept="image/*">
              <div class="form-text">Format: JPG, PNG. Maks 2MB</div>
            </div>

            <div class="col-12 pt-2">
              <button type="submit" class="btn btn-primary" style="padding:10px 26px;">
                <i class="bi bi-check-lg me-1"></i>Simpan Profil
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection