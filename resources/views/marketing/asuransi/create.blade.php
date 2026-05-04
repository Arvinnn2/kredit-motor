@extends('layouts.marketing')
@section('title', 'Tambah Asuransi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h4 class="fw-bold mb-1">Tambah Asuransi</h4>
    <a href="{{ route('marketing.asuransi.index') }}" class="text-muted" style="font-size:13px;text-decoration:none;"><i class="mdi mdi-arrow-left me-1"></i> Kembali</a>
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
    <div class="card" style="border-radius:12px;border:1px solid #e8ecf1;">
      <div class="card-body p-4">
        <form action="{{ route('marketing.asuransi.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label fw-semibold">Nama Asuransi <span class="text-danger">*</span></label>
            <input type="text" name="nama_asuransi" class="form-control @error('nama_asuransi') is-invalid @enderror"
              value="{{ old('nama_asuransi') }}" placeholder="Contoh: Asuransi TLO">
            @error('nama_asuransi')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label fw-semibold">Margin Asuransi (%) <span class="text-danger">*</span></label>
            <input type="number" step="0.01" name="margin_asuransi" class="form-control @error('margin_asuransi') is-invalid @enderror"
              value="{{ old('margin_asuransi') }}" placeholder="Contoh: 2.5">
            @error('margin_asuransi')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-4">
            <label class="form-label fw-semibold">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3" placeholder="Deskripsi asuransi...">{{ old('keterangan') }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary w-100" style="background:#059669;border-color:#059669;border-radius:8px;">
            <i class="mdi mdi-content-save me-1"></i> Simpan
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
