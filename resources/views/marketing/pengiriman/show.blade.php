@extends('layouts.marketing')
@section('title', 'Detail Pengiriman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h4 class="fw-bold mb-1">Detail & Edit Pengiriman</h4>
    <a href="{{ route('marketing.pengiriman.index') }}" class="text-muted" style="font-size:13px;text-decoration:none;"><i class="mdi mdi-arrow-left me-1"></i> Kembali</a>
  </div>
</div>

<div class="row g-3">
  <div class="col-md-5">
    <div class="card" style="border-radius:12px;border:1px solid #e8ecf1;">
      <div class="card-body p-4">
        <h6 class="fw-bold mb-3">Info Pengiriman</h6>
        <table class="table table-borderless mb-0" style="font-size:13.5px;">
          <tr><td style="color:#6b7280;width:40%">No. Invoice</td><td class="fw-semibold">{{ $pengiriman->no_invoice ?? '-' }}</td></tr>
          <tr><td style="color:#6b7280">Pelanggan</td><td class="fw-semibold">{{ $pengiriman->pengajuanKredit->pelanggan->nama_pelanggan ?? '-' }}</td></tr>
          <tr><td style="color:#6b7280">Tgl Kirim</td><td class="fw-semibold">{{ $pengiriman->tgl_kirim ? \Carbon\Carbon::parse($pengiriman->tgl_kirim)->format('d/m/Y') : '-' }}</td></tr>
          <tr><td style="color:#6b7280">Tgl Tiba</td><td class="fw-semibold">{{ $pengiriman->tgl_tiba ? \Carbon\Carbon::parse($pengiriman->tgl_tiba)->format('d/m/Y') : '-' }}</td></tr>
          <tr><td style="color:#6b7280">Kurir</td><td class="fw-semibold">{{ $pengiriman->nama_kurir ?? '-' }}</td></tr>
          <tr><td style="color:#6b7280">Telp Kurir</td><td class="fw-semibold">{{ $pengiriman->telpon_kurir ?? '-' }}</td></tr>
          <tr><td style="color:#6b7280">Status</td><td>
            @if($pengiriman->status_kirim === 'Tiba Di Tujuan')
              <span class="badge" style="background:#d1fae5;color:#059669;border-radius:20px;padding:4px 10px;">✅ Tiba Di Tujuan</span>
            @else
              <span class="badge" style="background:#dbeafe;color:#1d4ed8;border-radius:20px;padding:4px 10px;">🚚 Sedang Dikirim</span>
            @endif
          </td></tr>
          <tr><td style="color:#6b7280">Keterangan</td><td>{{ $pengiriman->keterangan ?? '-' }}</td></tr>
        </table>
        @if($pengiriman->bukti_foto)
        <div class="mt-3">
          <label class="fw-semibold" style="font-size:13px;">Bukti Foto</label><br>
          <img src="{{ Storage::url($pengiriman->bukti_foto) }}" alt="Bukti Foto"
            style="width:100%;max-height:200px;object-fit:cover;border-radius:8px;border:1px solid #e8ecf1;margin-top:8px;">
        </div>
        @endif
      </div>
    </div>
  </div>

  <div class="col-md-7">
    <div class="card" style="border-radius:12px;border:1px solid #e8ecf1;">
      <div class="card-body p-4">
        <h6 class="fw-bold mb-3">Update Data Pengiriman</h6>
        <form action="{{ route('marketing.pengiriman.update', $pengiriman) }}" method="POST" enctype="multipart/form-data">
          @csrf @method('PUT')
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold">No. Invoice</label>
              <input type="text" name="no_invoice" class="form-control" value="{{ $pengiriman->no_invoice ?? '' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Status Kirim <span class="text-danger">*</span></label>
              <select name="status_kirim" class="form-select">
                <option value="Sedang Dikirim" {{ $pengiriman->status_kirim == 'Sedang Dikirim' ? 'selected' : '' }}>Sedang Dikirim</option>
                <option value="Tiba Di Tujuan" {{ $pengiriman->status_kirim == 'Tiba Di Tujuan' ? 'selected' : '' }}>Tiba Di Tujuan</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Nama Kurir</label>
              <input type="text" name="nama_kurir" class="form-control" value="{{ $pengiriman->nama_kurir ?? '' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Telp Kurir</label>
              <input type="text" name="telpon_kurir" class="form-control" value="{{ $pengiriman->telpon_kurir ?? '' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Tanggal Kirim</label>
              <input type="date" name="tgl_kirim" class="form-control" value="{{ $pengiriman->tgl_kirim ?? '' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Tanggal Tiba</label>
              <input type="date" name="tgl_tiba" class="form-control" value="{{ $pengiriman->tgl_tiba ?? '' }}">
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold">Keterangan</label>
              <textarea name="keterangan" class="form-control" rows="2">{{ $pengiriman->keterangan ?? '' }}</textarea>
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold">Bukti Foto</label>
              <input type="file" name="bukti_foto" class="form-control" accept="image/*">
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary w-100" style="background:#059669;border-color:#059669;border-radius:8px;">
                <i class="mdi mdi-content-save me-1"></i> Simpan Perubahan
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
