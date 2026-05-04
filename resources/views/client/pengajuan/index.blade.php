@extends('layouts.client')
@section('title', 'Pengajuan Saya')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <div class="page-title">Pengajuan Saya</div>
    <div class="page-sub">Riwayat pengajuan kredit motor Anda</div>
  </div>
  <a href="{{ route('client.motor.index') }}" class="btn btn-primary">
    <i class="bi bi-plus-lg me-1"></i> Ajukan Baru
  </a>
</div>

<div class="card">
  <div class="card-body p-0 !important" style="padding:0 !important;">
    <div style="overflow-x:auto;">
      <table class="table" style="margin-bottom:0;">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Motor</th>
            <th>Lama Cicilan</th>
            <th>Cicilan/Bulan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($pengajuan as $p)
          <tr>
            <td>{{ \Carbon\Carbon::parse($p->tgl_pengajuan_kredit)->format('d/m/Y') }}</td>
            <td>
              <div style="font-weight:600;">{{ $p->motor->nama_motor ?? '-' }}</div>
              <div style="font-size:12px;color:#6b7280;">{{ $p->motor->merk ?? '' }}</div>
            </td>
            <td>{{ $p->jenisCicilan->lama_cicilan ?? '-' }} bulan</td>
            <td style="font-weight:700;color:#1969ff;">Rp {{ number_format($p->cicilan_perbulan, 0, ',', '.') }}</td>
            <td>
              @php
                $badgeMap = [
                  'Menunggu Konfirmasi' => ['bg:#fff8e6;color:#d97706;border:1px solid #fde68a', 'Menunggu'],
                  'Diproses'            => ['bg:#eff4ff;color:#1969ff;border:1px solid #d6e2ff', 'Diproses'],
                  'Diterima'            => ['bg:#f0fdf4;color:#16a34a;border:1px solid #bbf7d0', 'Diterima'],
                  'Dibatalkan Penjual'  => ['bg:#fef2f2;color:#dc2626;border:1px solid #fecaca', 'Dibatalkan'],
                  'Dibatalkan Pembeli'  => ['bg:#f4f6fb;color:#6b7280;border:1px solid #e5e7eb', 'Dibatalkan'],
                  'Bermasalah'          => ['bg:#fef2f2;color:#dc2626;border:1px solid #fecaca', 'Bermasalah'],
                  'Selesai'             => ['bg:#eff4ff;color:#1969ff;border:1px solid #d6e2ff', 'Selesai'],
                ];
                $bStyle = $badgeMap[$p->status_pengajuan][0] ?? 'bg:#f4f6fb;color:#6b7280;border:1px solid #e5e7eb';
                $bLabel = $badgeMap[$p->status_pengajuan][1] ?? $p->status_pengajuan;
              @endphp
              <span style="font-size:11px;font-weight:700;padding:4px 10px;border-radius:6px;display:inline-block;{{ $bStyle }}">
                {{ $bLabel }}
              </span>
            </td>
            <td>
              <a href="{{ route('client.pengajuan.show', $p) }}" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-eye"></i> Detail
              </a>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center py-5 text-muted">
              <div style="font-size:40px;margin-bottom:12px;">📄</div>
              <div style="font-weight:600;margin-bottom:6px;">Belum ada pengajuan</div>
              <div style="font-size:13px;margin-bottom:16px;">Mulai ajukan kredit motor impianmu sekarang</div>
              <a href="{{ route('client.motor.index') }}" class="btn btn-primary btn-sm">Lihat Katalog Motor</a>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    @if($pengajuan->hasPages())
    <div style="padding:12px 20px;border-top:1px solid #f3f4f6;">{{ $pengajuan->links() }}</div>
    @endif
  </div>
</div>
@endsection