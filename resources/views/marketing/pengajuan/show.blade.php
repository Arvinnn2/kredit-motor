@extends('layouts.marketing')
@section('title', 'Detail Pengajuan')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h4 class="page-title">Detail Pengajuan</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('marketing.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('marketing.pengajuan.index') }}">Pengajuan Kredit</a></li>
            <li class="breadcrumb-item active">Detail</li>
          </ol>
        </nav>
      </div>
      <a href="{{ route('marketing.pengajuan.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="mdi mdi-arrow-left me-1"></i> Kembali
      </a>
    </div>
  </div>
</div>

<div class="row">

  {{-- Data Pelanggan --}}
  <div class="col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <h6 class="card-title mb-3">Data Pelanggan</h6>
        <table class="table table-borderless mb-0" style="font-size:13.5px">
          <tr><td style="color:#6b7280;width:35%">Nama</td><td style="font-weight:500">{{ $pengajuan->pelanggan->nama_pelanggan ?? '-' }}</td></tr>
          <tr><td style="color:#6b7280">Email</td><td style="font-weight:500">{{ $pengajuan->pelanggan->user->email ?? '-' }}</td></tr>
          <tr><td style="color:#6b7280">No. Telp</td><td style="font-weight:500">{{ $pengajuan->pelanggan->no_telp ?? '-' }}</td></tr>
          <tr><td style="color:#6b7280">Alamat</td><td style="font-weight:500">{{ $pengajuan->pelanggan->alamat1 ?? '-' }}, {{ $pengajuan->pelanggan->kota1 ?? '' }}</td></tr>
        </table>
      </div>
    </div>
  </div>

  {{-- Data Kredit --}}
  <div class="col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <h6 class="card-title mb-3">Data Kredit</h6>
        <table class="table table-borderless mb-0" style="font-size:13.5px">
          <tr><td style="color:#6b7280;width:40%">Motor</td><td style="font-weight:500">{{ $pengajuan->motor->nama_motor ?? '-' }}</td></tr>
          <tr>
            <td style="color:#6b7280">Stok Motor</td>
            <td>
              <span style="font-weight:600;color:{{ $pengajuan->motor->stok > 0 ? '#16a34a' : '#dc2626' }}">
                {{ $pengajuan->motor->stok }} unit
              </span>
            </td>
          </tr>
          <tr><td style="color:#6b7280">Harga Cash</td><td style="font-weight:500">Rp {{ number_format($pengajuan->harga_cash, 0, ',', '.') }}</td></tr>
          <tr>
            <td style="color:#6b7280">DP Otomatis</td>
            <td style="font-weight:700;color:#059669;font-size:14px;">
              Rp {{ number_format($pengajuan->dp, 0, ',', '.') }}
              @if($pengajuan->jenisCicilan)
                @php
                  $lama = $pengajuan->jenisCicilan->lama_cicilan;
                  $persen = match(true) {
                    $lama <= 12 => 25,
                    $lama <= 24 => 20,
                    $lama <= 36 => 15,
                    default     => 10,
                  };
                @endphp
                <span style="font-size:11px;font-weight:500;color:#6b7280;">({{ $persen }}% dari harga)</span>
              @endif
            </td>
          </tr>
          <tr><td style="color:#6b7280">Tenor</td><td style="font-weight:500">{{ $pengajuan->jenisCicilan->lama_cicilan ?? '-' }} bulan</td></tr>
          <tr><td style="color:#6b7280">Asuransi</td><td style="font-weight:500">{{ $pengajuan->asuransi->nama_asuransi ?? '-' }}</td></tr>
          <tr>
            <td style="color:#6b7280">Harga Kredit</td>
            <td style="font-weight:500">Rp {{ number_format($pengajuan->harga_kredit, 0, ',', '.') }}</td>
          </tr>
          <tr>
            <td style="color:#6b7280">Cicilan/Bulan</td>
            <td style="font-weight:700;color:#2196f3;font-size:15px">
              Rp {{ number_format($pengajuan->cicilan_perbulan, 0, ',', '.') }}
            </td>
          </tr>
          <tr>
            <td style="color:#6b7280">+ Asuransi/Bln</td>
            <td style="font-weight:500">Rp {{ number_format($pengajuan->biaya_asuransi_perbulan, 0, ',', '.') }}</td>
          </tr>
          <tr>
            <td style="color:#6b7280">Total/Bulan</td>
            <td style="font-weight:700;color:#059669;font-size:14px;">
              Rp {{ number_format($pengajuan->cicilan_perbulan + $pengajuan->biaya_asuransi_perbulan, 0, ',', '.') }}
            </td>
          </tr>
          <tr>
            <td style="color:#6b7280">Status</td>
            <td>
              @php
                $colors = [
                  'Menunggu Konfirmasi' => 'warning',
                  'Diterima'            => 'success',
                  'DP Dibayar'          => 'info',
                  'Diproses'            => 'primary',
                  'Dibatalkan Penjual'  => 'danger',
                  'Dibatalkan Pembeli'  => 'secondary',
                  'Bermasalah'          => 'danger',
                  'Selesai'             => 'success',
                ];
                $c = $colors[$pengajuan->status_pengajuan] ?? 'secondary';
              @endphp
              <span class="badge bg-{{ $c }}">{{ $pengajuan->status_pengajuan }}</span>
            </td>
          </tr>
          <tr><td style="color:#6b7280">Tanggal</td><td style="font-weight:500">{{ \Carbon\Carbon::parse($pengajuan->tgl_pengajuan_kredit)->format('d/m/Y') }}</td></tr>
          @if($pengajuan->keterangan_status_pengajuan)
          <tr><td style="color:#6b7280">Keterangan</td><td style="font-weight:500">{{ $pengajuan->keterangan_status_pengajuan }}</td></tr>
          @endif
        </table>
      </div>
    </div>
  </div>

  {{-- Dokumen --}}
  <div class="col-12 mb-4">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title mb-3">Dokumen Pengajuan</h6>
        <div class="row g-3">
          @foreach(['url_ktp' => 'KTP', 'url_kk' => 'Kartu Keluarga', 'url_npwp' => 'NPWP', 'url_slip_gaji' => 'Slip Gaji', 'url_foto' => 'Foto Diri'] as $key => $label)
          <div class="col-md-2 col-sm-4 col-6">
            <div style="font-size:12px;color:#6b7280;margin-bottom:6px;font-weight:500">{{ $label }}</div>
            @if($pengajuan->$key)
              <a href="{{ asset('storage/'.$pengajuan->$key) }}" target="_blank" class="btn btn-sm btn-outline-primary w-100">
                <i class="mdi mdi-file-outline me-1"></i> Lihat
              </a>
            @else
              <span style="font-size:12px;color:#9ca3af">Tidak ada</span>
            @endif
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  {{-- ════════════════════════════════════════
       TINDAKAN — tampil sesuai status
  ════════════════════════════════════════ --}}

  {{-- STEP 1: Menunggu Konfirmasi → review dokumen lalu approve/tolak --}}
  @if($pengajuan->status_pengajuan === 'Menunggu Konfirmasi')
  <div class="col-12 mb-4">
    <div class="card border-warning">
      <div class="card-body">
        <h6 class="card-title mb-1">
          <i class="mdi mdi-clock-outline text-warning me-1"></i>
          Tindakan — Pengajuan Menunggu Konfirmasi
        </h6>
        <p style="font-size:12.5px;color:#6b7280;margin-bottom:20px;">
          Review dokumen pelanggan lalu setujui atau tolak pengajuan ini.
        </p>

        {{-- Info DP Otomatis --}}
        <div style="background:#f0fdf4;border:1.5px solid #86efac;border-radius:10px;padding:14px 18px;margin-bottom:20px;">
          <div style="font-size:12px;font-weight:700;color:#16a34a;margin-bottom:10px;">
            <i class="mdi mdi-calculator me-1"></i> Rincian Kredit (Dihitung Otomatis)
          </div>
          <div class="row g-2">
            <div class="col-6 col-md-3">
              <div style="font-size:11px;color:#6b7280;">Harga Motor</div>
              <div style="font-weight:700;font-size:13px;">Rp {{ number_format($pengajuan->harga_cash, 0, ',', '.') }}</div>
            </div>
            <div class="col-6 col-md-3">
              <div style="font-size:11px;color:#6b7280;">
                DP
                @php
                  $lama = $pengajuan->jenisCicilan->lama_cicilan ?? 12;
                  $persen = match(true) {
                    $lama <= 12 => 25,
                    $lama <= 24 => 20,
                    $lama <= 36 => 15,
                    default     => 10,
                  };
                @endphp
                ({{ $persen }}% · {{ $lama }} bln)
              </div>
              <div style="font-weight:700;font-size:14px;color:#059669;">Rp {{ number_format($pengajuan->dp, 0, ',', '.') }}</div>
            </div>
            <div class="col-6 col-md-3">
              <div style="font-size:11px;color:#6b7280;">Cicilan/Bulan</div>
              <div style="font-weight:700;font-size:14px;color:#1969ff;">Rp {{ number_format($pengajuan->cicilan_perbulan, 0, ',', '.') }}</div>
            </div>
            <div class="col-6 col-md-3">
              <div style="font-size:11px;color:#6b7280;">Total/Bulan</div>
              <div style="font-weight:700;font-size:14px;color:#059669;">Rp {{ number_format($pengajuan->cicilan_perbulan + $pengajuan->biaya_asuransi_perbulan, 0, ',', '.') }}</div>
            </div>
          </div>
        </div>

        <div class="row g-3">
          {{-- Form Approve --}}
          <div class="col-md-6">
            <form action="{{ route('marketing.pengajuan.approve', $pengajuan->id) }}" method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label" style="font-size:13px;font-weight:600;">
                  Catatan untuk Pelanggan <span style="font-size:11px;color:#9ca3af;">(opsional)</span>
                </label>
                <input type="text" name="keterangan" class="form-control"
                       placeholder="Contoh: Silakan segera bayar DP..."
                       style="font-size:13px;">
              </div>
              <button type="submit" class="btn btn-success w-100"
                      onclick="return confirm('Setujui pengajuan ini?\nDP: Rp {{ number_format($pengajuan->dp, 0, ',', '.') }}')">
                <i class="mdi mdi-check-circle-outline me-1"></i>
                Setujui Pengajuan
              </button>
            </form>
          </div>

          {{-- Form Tolak --}}
          <div class="col-md-6">
            <form action="{{ route('marketing.pengajuan.reject', $pengajuan->id) }}" method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label" style="font-size:13px;font-weight:600;">
                  Alasan Penolakan <span class="text-danger">*</span>
                </label>
                <textarea name="keterangan" class="form-control" rows="3" required
                          placeholder="Contoh: Dokumen KTP tidak jelas, mohon upload ulang."
                          style="font-size:13px;"></textarea>
              </div>
              <button type="submit" class="btn btn-danger w-100"
                      onclick="return confirm('Tolak pengajuan ini?')">
                <i class="mdi mdi-close-circle-outline me-1"></i> Tolak Pengajuan
              </button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
  @endif

  {{-- INFO: Diterima — menunggu pelanggan bayar DP --}}
  @if($pengajuan->status_pengajuan === 'Diterima')
  <div class="col-12 mb-4">
    <div class="card border-success">
      <div class="card-body d-flex align-items-center gap-3">
        <i class="mdi mdi-clock-outline text-success" style="font-size:28px;"></i>
        <div>
          <div style="font-weight:600;font-size:14px;color:#166534;">Menunggu Pembayaran DP dari Pelanggan</div>
          <div style="font-size:12.5px;color:#6b7280;margin-top:2px;">
            DP yang harus dibayar: <strong>Rp {{ number_format($pengajuan->dp, 0, ',', '.') }}</strong>.
            Halaman ini otomatis update setelah DP masuk.
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  {{-- STEP 2: DP Dibayar — verifikasi → aktifkan kredit --}}
  @if($pengajuan->status_pengajuan === 'DP Dibayar')
  <div class="col-12 mb-4">
    <div class="card border-info">
      <div class="card-body">
        <div class="d-flex align-items-start gap-3">
          <div style="width:48px;height:48px;border-radius:12px;background:#e0f2fe;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <i class="mdi mdi-cash-check" style="font-size:24px;color:#0284c7;"></i>
          </div>
          <div style="flex:1;">
            <h6 class="card-title mb-1">DP Sudah Dibayar Pelanggan</h6>
            <p style="font-size:12.5px;color:#6b7280;margin-bottom:16px;">
              Pelanggan telah membayar DP <strong>Rp {{ number_format($pengajuan->dp, 0, ',', '.') }}</strong>.
              Klik tombol di bawah untuk memverifikasi dan mengaktifkan kredit.
              <br>
              <span style="color:#dc2626;font-weight:600;">
                ⚠ Stok motor akan otomatis berkurang 1 unit (saat ini: {{ $pengajuan->motor->stok }} unit).
              </span>
            </p>
            <form action="{{ route('marketing.pengajuan.approve-dp', $pengajuan->id) }}" method="POST"
                  onsubmit="return confirm('Verifikasi DP dan aktifkan kredit?\nStok motor akan berkurang 1 unit.\nJadwal angsuran akan dibuat otomatis.')">
              @csrf
              <button type="submit" class="btn btn-primary">
                <i class="mdi mdi-check-decagram me-1"></i>
                Verifikasi DP &amp; Aktifkan Kredit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  {{-- INFO: Kredit aktif --}}
  @if($pengajuan->status_pengajuan === 'Diproses')
  <div class="col-12 mb-4">
    <div class="card border-primary">
      <div class="card-body d-flex align-items-center gap-3">
        <i class="mdi mdi-bike-fast text-primary" style="font-size:28px;"></i>
        <div>
          <div style="font-weight:600;font-size:14px;color:#1e40af;">Kredit Sedang Berjalan</div>
          <div style="font-size:12.5px;color:#6b7280;">
            DP terverifikasi. Jadwal angsuran aktif. Stok motor sudah dikurangi.
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  {{-- INFO: Selesai --}}
  @if($pengajuan->status_pengajuan === 'Selesai')
  <div class="col-12 mb-4">
    <div class="card" style="border:1px solid #86efac;">
      <div class="card-body d-flex align-items-center gap-3">
        <i class="mdi mdi-check-circle text-success" style="font-size:28px;"></i>
        <div>
          <div style="font-weight:600;font-size:14px;color:#166534;">Kredit Lunas & Selesai 🎉</div>
          <div style="font-size:12.5px;color:#6b7280;">Semua angsuran sudah dibayar. Motor resmi milik pelanggan.</div>
        </div>
      </div>
    </div>
  </div>
  @endif

  {{-- Jadwal Angsuran --}}
  @if($pengajuan->angsuran->count() > 0)
  <div class="col-12 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h6 class="card-title mb-0">
            Jadwal Angsuran
            <span class="badge bg-secondary ms-1">{{ $pengajuan->angsuran->count() }} bulan</span>
          </h6>
          @php
            $lunas  = $pengajuan->angsuran->whereNotNull('tgl_bayar')->count();
            $total  = $pengajuan->angsuran->count();
            $persen = $total > 0 ? round(($lunas / $total) * 100) : 0;
          @endphp
          <span style="font-size:13px;color:#6b7280;">{{ $lunas }}/{{ $total }} lunas ({{ $persen }}%)</span>
        </div>
        <div style="height:6px;background:#e5e7eb;border-radius:100px;overflow:hidden;margin-bottom:16px;">
          <div style="height:100%;background:#2196f3;width:{{ $persen }}%;border-radius:100px;"></div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr><th>Ke-</th><th>Total Bayar</th><th>Tanggal Bayar</th><th>Keterangan</th><th>Status</th></tr>
            </thead>
            <tbody>
              @foreach($pengajuan->angsuran->sortBy('angsuran_ke') as $a)
              <tr>
                <td><strong>{{ $a->angsuran_ke }}</strong></td>
                <td>Rp {{ number_format($a->total_bayar, 0, ',', '.') }}</td>
                <td>{{ $a->tgl_bayar ? \Carbon\Carbon::parse($a->tgl_bayar)->format('d/m/Y') : '-' }}</td>
                <td style="font-size:12px;color:#6b7280;">{{ $a->keterangan ?? '-' }}</td>
                <td>
                  @if($a->tgl_bayar)
                    <span class="badge bg-success">Lunas</span>
                  @else
                    <span class="badge bg-warning text-dark">Belum Bayar</span>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endif

  {{-- Info Pengiriman --}}
  @if($pengajuan->pengiriman)
  <div class="col-12 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h6 class="card-title mb-0">Info Pengiriman</h6>
          <a href="{{ route('marketing.pengiriman.show', $pengajuan->pengiriman) }}" class="btn btn-sm btn-outline-primary">
            <i class="mdi mdi-pencil-outline me-1"></i> Update Status
          </a>
        </div>
        <table class="table table-borderless mb-0" style="font-size:13.5px">
          <tr><td style="color:#6b7280;width:20%">No. Invoice</td><td style="font-weight:500">{{ $pengajuan->pengiriman->no_invoice ?? '-' }}</td></tr>
          <tr><td style="color:#6b7280">Kurir</td><td style="font-weight:500">{{ $pengajuan->pengiriman->nama_kurir ?? 'Belum diisi' }}</td></tr>
          <tr>
            <td style="color:#6b7280">Status Kirim</td>
            <td>
              <span class="badge {{ $pengajuan->pengiriman->status_kirim === 'Tiba Di Tujuan' ? 'bg-success' : 'bg-warning text-dark' }}">
                {{ $pengajuan->pengiriman->status_kirim }}
              </span>
            </td>
          </tr>
          <tr><td style="color:#6b7280">Keterangan</td><td style="font-weight:500">{{ $pengajuan->pengiriman->keterangan ?? '-' }}</td></tr>
        </table>
      </div>
    </div>
  </div>
  @endif

</div>
@endsection