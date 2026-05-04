@extends('layouts.marketing')
@section('title', 'Detail Angsuran')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h4 class="fw-bold mb-1">Detail Angsuran</h4>
    <a href="{{ route('marketing.angsuran.index') }}" class="text-muted" style="font-size:13px;text-decoration:none;"><i class="mdi mdi-arrow-left me-1"></i> Kembali ke daftar</a>
  </div>
  <div class="d-flex gap-2">
    @if($angsuran->tgl_bayar)
    <a href="{{ route('marketing.angsuran.kwitansi', $angsuran) }}" target="_blank" class="btn btn-success btn-sm" style="border-radius:8px;">
      <i class="mdi mdi-printer me-1"></i> Cetak Kwitansi
    </a>
    @endif
  </div>
</div>

<div class="row g-3">
  <div class="col-md-6">
    <div class="card h-100" style="border-radius:12px;border:1px solid #e8ecf1;">
      <div class="card-body p-4">
        <h6 class="fw-bold mb-3">Informasi Angsuran</h6>
        <table class="table table-borderless mb-0" style="font-size:13.5px">
          <tr><td style="color:#6b7280;width:40%">Pelanggan</td><td class="fw-semibold">{{ $angsuran->pengajuanKredit->pelanggan->nama_pelanggan ?? '-' }}</td></tr>
          <tr><td style="color:#6b7280">Motor</td><td class="fw-semibold">{{ $angsuran->pengajuanKredit->motor->nama_motor ?? '-' }}</td></tr>
          <tr><td style="color:#6b7280">Angsuran Ke</td><td class="fw-semibold">{{ $angsuran->angsuran_ke }} / {{ $angsuran->pengajuanKredit->jenisCicilan->lama_cicilan ?? '-' }}</td></tr>
          <tr><td style="color:#6b7280">Total Bayar</td><td class="fw-bold" style="font-size:16px;color:#059669">Rp {{ number_format($angsuran->total_bayar, 0, ',', '.') }}</td></tr>
          <tr><td style="color:#6b7280">Tgl Bayar</td><td class="fw-semibold">{{ $angsuran->tgl_bayar ? \Carbon\Carbon::parse($angsuran->tgl_bayar)->format('d/m/Y') : '-' }}</td></tr>
          <tr><td style="color:#6b7280">Keterangan</td><td>{{ $angsuran->keterangan ?? '-' }}</td></tr>
          <tr><td style="color:#6b7280">Status Macet</td><td>
            @if($angsuran->macet)
              <span class="badge" style="background:#fee2e2;color:#dc2626;border-radius:20px;padding:4px 10px;">Macet</span>
            @else
              <span class="badge" style="background:#d1fae5;color:#059669;border-radius:20px;padding:4px 10px;">Normal</span>
            @endif
          </td></tr>
        </table>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card h-100" style="border-radius:12px;border:1px solid #e8ecf1;">
      <div class="card-body p-4">
        <h6 class="fw-bold mb-3">Update Status Angsuran</h6>
        <form action="{{ route('marketing.angsuran.update', $angsuran) }}" method="POST">
          @csrf @method('PUT')
          <div class="mb-3">
            <label class="form-label fw-semibold">Tanggal Pembayaran</label>
            <input type="date" name="tgl_bayar" class="form-control" value="{{ $angsuran->tgl_bayar ?? '' }}">
          </div>
          <div class="mb-3">
            <label class="form-label fw-semibold">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" placeholder="Metode bayar, catatan, dll." value="{{ $angsuran->keterangan ?? '' }}">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="macet" value="1" id="macetCheck" {{ $angsuran->macet ? 'checked' : '' }}>
            <label class="form-check-label" for="macetCheck">Tandai sebagai Macet</label>
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
