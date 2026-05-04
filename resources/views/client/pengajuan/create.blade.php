@extends('layouts.client')
@section('title', 'Form Pengajuan Kredit')

@section('content')
<div class="mb-3">
  <a href="{{ route('client.motor.show', $motor) }}" style="font-size:13px;color:#6b7280;text-decoration:none;">
    <i class="bi bi-arrow-left me-1"></i> Kembali ke Detail Motor
  </a>
</div>

<div class="page-title mb-1">Form Pengajuan Kredit</div>
<div class="page-sub mb-4">Isi data berikut untuk mengajukan kredit motor</div>

<div class="row g-3">
  {{-- Info Motor --}}
  <div class="col-lg-4">
    <div class="card" style="position:sticky;top:80px;">
      <div class="card-header">Motor Dipilih</div>
      <div class="card-body">
        @if($motor->foto1)
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
            <img src="{{ asset('storage/'.$motor->foto1) }}"
                style="width:100%; height:100%; object-fit:contain;">
          </div>
        @else
          <div style="height:160px;background:#f4f6fb;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:56px;margin-bottom:12px;">🏍️</div>
        @endif

        <div style="font-size:11px;font-weight:700;color:#1969ff;text-transform:uppercase;margin-bottom:4px;">
          {{ $motor->merk }}
        </div>
        <div style="font-weight:700;font-size:16px;margin-bottom:6px;">{{ $motor->nama_motor }}</div>
        <div style="font-size:22px;font-weight:800;color:#1969ff;margin-bottom:12px;">
          Rp {{ number_format($motor->harga_jual, 0, ',', '.') }}
        </div>

        {{-- Stok --}}
        <div style="padding:10px 12px;border-radius:8px;background:#f0fdf4;border:1px solid #bbf7d0;margin-bottom:10px;">
          <div style="font-size:12px;font-weight:600;color:#16a34a;">
            <i class="bi bi-check-circle me-1"></i>Stok: {{ $motor->stok }} unit
          </div>
        </div>

        {{-- Tabel DP otomatis --}}
        <div style="padding:12px 14px;border-radius:8px;background:#eff4ff;border:1px solid #c7d9ff;">
          <div style="font-size:12px;font-weight:700;color:#1969ff;margin-bottom:8px;">
            <i class="bi bi-percent me-1"></i>DP Otomatis per Tenor
          </div>
          @foreach($tabelDP as $tenor => $persen)
          <div class="d-flex justify-content-between" style="font-size:12px;padding:3px 0;border-bottom:1px dashed #dbeafe;">
            <span style="color:#374151;">{{ $tenor }} bulan</span>
            <span style="font-weight:700;color:#1969ff;">
              {{ $persen }}% = Rp {{ number_format($motor->harga_jual * $persen / 100, 0, ',', '.') }}
            </span>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  {{-- Form --}}
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header">Data Pengajuan</div>
      <div class="card-body">
        <form action="{{ route('client.pengajuan.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id_motor" value="{{ $motor->id }}">

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Tenor Cicilan <span class="text-danger">*</span></label>
              <select name="id_jenis_cicilan"
                      class="form-select @error('id_jenis_cicilan') is-invalid @enderror"
                      onchange="hitungSimulasi()">
                <option value="">-- Pilih Tenor --</option>
                @foreach($jenisCicilan as $jc)
                  <option value="{{ $jc->id }}"
                          data-margin="{{ $jc->margin_kredit }}"
                          data-lama="{{ $jc->lama_cicilan }}"
                          {{ old('id_jenis_cicilan') == $jc->id ? 'selected' : '' }}>
                    {{ $jc->lama_cicilan }} bulan (bunga {{ $jc->margin_kredit }}%)
                  </option>
                @endforeach
              </select>
              @error('id_jenis_cicilan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Asuransi <span class="text-danger">*</span></label>
              <select name="id_asuransi"
                      class="form-select @error('id_asuransi') is-invalid @enderror"
                      onchange="hitungSimulasi()">
                <option value="">-- Pilih Asuransi --</option>
                @foreach($asuransi as $a)
                  <option value="{{ $a->id }}"
                          data-margin="{{ $a->margin_asuransi }}"
                          {{ old('id_asuransi') == $a->id ? 'selected' : '' }}>
                    {{ $a->nama_asuransi }} ({{ $a->margin_asuransi }}%)
                  </option>
                @endforeach
              </select>
              @error('id_asuransi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            {{-- Simulasi Otomatis --}}
            <div class="col-12" id="simulasi-box" style="display:none;">
              <div style="background:#f0fdf4;border:1.5px solid #86efac;border-radius:12px;padding:16px 18px;">
                <div style="font-size:12px;font-weight:700;color:#16a34a;margin-bottom:12px;">
                  <i class="bi bi-calculator-fill me-1"></i>Simulasi Cicilan
                </div>
                <div class="row g-2">
                  <div class="col-6 col-md-3">
                    <div style="font-size:11px;color:#6b7280;margin-bottom:3px;">DP (<span id="sim-persen-dp">-</span>%)</div>
                    <div style="font-weight:700;font-size:14px;color:#16a34a;" id="sim-dp">-</div>
                  </div>
                  <div class="col-6 col-md-3">
                    <div style="font-size:11px;color:#6b7280;margin-bottom:3px;">Harga Kredit</div>
                    <div style="font-weight:600;font-size:13px;" id="sim-harga-kredit">-</div>
                  </div>
                  <div class="col-6 col-md-3">
                    <div style="font-size:11px;color:#6b7280;margin-bottom:3px;">Cicilan/Bulan</div>
                    <div style="font-weight:700;font-size:14px;color:#1969ff;" id="sim-cicilan">-</div>
                  </div>
                  <div class="col-6 col-md-3">
                    <div style="font-size:11px;color:#6b7280;margin-bottom:3px;">+ Asuransi/Bln</div>
                    <div style="font-weight:600;font-size:13px;" id="sim-asuransi">-</div>
                  </div>
                </div>
                <div style="margin-top:10px;padding-top:10px;border-top:1px dashed #86efac;display:flex;justify-content:space-between;align-items:center;">
                  <span style="font-size:11px;color:#6b7280;">Total bayar per bulan</span>
                  <span style="font-size:16px;font-weight:800;color:#059669;" id="sim-total">-</span>
                </div>
                <div style="font-size:11px;color:#9ca3af;margin-top:8px;">
                  * DP dibayar di awal sebelum kredit aktif.
                </div>
              </div>
            </div>

            {{-- Dokumen --}}
            <div class="col-12">
              <div style="border-top:1px solid #e5e7eb;padding-top:16px;">
                <div style="font-size:13.5px;font-weight:700;color:#0d0f1a;margin-bottom:2px;">
                  <i class="bi bi-paperclip me-1 text-primary"></i>Upload Dokumen
                </div>
                <div style="font-size:12px;color:#6b7280;">Format: JPG, PNG, PDF. Maks 2MB per file.</div>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">KTP <span class="text-danger">*</span></label>
              <input type="file" name="url_ktp" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Kartu Keluarga <span class="text-danger">*</span></label>
              <input type="file" name="url_kk" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">NPWP <span style="font-size:11px;color:#9ca3af;">(opsional)</span></label>
              <input type="file" name="url_npwp" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
            </div>
            <div class="col-md-6">
              <label class="form-label">Slip Gaji <span style="font-size:11px;color:#9ca3af;">(opsional)</span></label>
              <input type="file" name="url_slip_gaji" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
            </div>
            <div class="col-md-6">
              <label class="form-label">Foto Diri <span style="font-size:11px;color:#9ca3af;">(opsional)</span></label>
              <input type="file" name="url_foto" class="form-control" accept="image/*">
            </div>

            <div class="col-12 mt-2">
              <button type="submit" class="btn btn-primary" style="padding:11px 28px;">
                <i class="bi bi-send me-2"></i>Kirim Pengajuan
              </button>
              <a href="{{ route('client.motor.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  const hargaMotor = {{ $motor->harga_jual }};

  // Tabel persen DP dari server (hardcode sama dengan controller)
  const tabelDP = @json($tabelDP);

  function getPersen(lama) {
    if (lama <= 12) return 25;
    if (lama <= 24) return 20;
    if (lama <= 36) return 15;
    return 10;
  }

  function formatRp(n) {
    return 'Rp ' + Math.round(n).toLocaleString('id-ID');
  }

  function hitungSimulasi() {
    const sC  = document.querySelector('select[name="id_jenis_cicilan"]');
    const sA  = document.querySelector('select[name="id_asuransi"]');
    const box = document.getElementById('simulasi-box');

    const oC = sC.options[sC.selectedIndex];
    const oA = sA.options[sA.selectedIndex];

    if (!oC.value || !oA.value) {
      box.style.display = 'none';
      return;
    }

    const lama         = parseInt(oC.dataset.lama);
    const marginKredit = parseFloat(oC.dataset.margin);
    const marginAsr    = parseFloat(oA.dataset.margin);
    const persenDP     = getPersen(lama);

    const dp           = Math.round(hargaMotor * persenDP / 100);
    const hargaKredit  = Math.round(hargaMotor * (1 + marginKredit / 100));
    const sisaHarga    = hargaKredit - dp;
    const cicilan      = Math.round(sisaHarga / lama);
    const asuransi     = Math.round((hargaMotor * marginAsr / 100) / lama);
    const total        = cicilan + asuransi;

    document.getElementById('sim-persen-dp').textContent    = persenDP;
    document.getElementById('sim-dp').textContent           = formatRp(dp);
    document.getElementById('sim-harga-kredit').textContent = formatRp(hargaKredit);
    document.getElementById('sim-cicilan').textContent      = formatRp(cicilan);
    document.getElementById('sim-asuransi').textContent     = formatRp(asuransi);
    document.getElementById('sim-total').textContent        = formatRp(total);

    box.style.display = 'block';
  }
</script>
@endpush