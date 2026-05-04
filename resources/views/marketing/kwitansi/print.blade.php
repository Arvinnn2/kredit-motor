<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kwitansi Angsuran - Kredio</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700;800&display=swap');
    * { margin:0; padding:0; box-sizing:border-box; }
    body { font-family:'DM Sans',sans-serif; background:#f8f9fa; display:flex; justify-content:center; padding:30px 20px; }
    .kwitansi-wrap { background:#fff; width:700px; border-radius:16px; overflow:hidden; box-shadow:0 4px 24px rgba(0,0,0,0.10); }
    .kwitansi-header { background:linear-gradient(135deg,#059669 0%,#10b981 100%); padding:36px 40px; color:#fff; }
    .brand { font-size:28px; font-weight:800; letter-spacing:-1px; }
    .brand span { opacity:0.7; font-weight:400; font-size:14px; }
    .kwitansi-title { font-size:13px; font-weight:500; text-transform:uppercase; letter-spacing:2px; opacity:0.85; margin-top:4px; }
    .kwitansi-body { padding:36px 40px; }
    .no-kwitansi { font-size:12px; color:#6b7280; font-weight:600; text-transform:uppercase; letter-spacing:1px; margin-bottom:24px; }
    .no-kwitansi span { color:#059669; font-size:14px; font-weight:700; }
    .info-grid { display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:28px; }
    .info-item label { font-size:11px; color:#9ca3af; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; display:block; margin-bottom:4px; }
    .info-item .val { font-size:14px; font-weight:600; color:#1a1a2e; }
    .total-box { background:#f0fdf4; border:2px solid #a7f3d0; border-radius:12px; padding:20px 24px; display:flex; justify-content:space-between; align-items:center; margin-bottom:28px; }
    .total-box .lbl { font-size:13px; font-weight:600; color:#065f46; }
    .total-box .amt { font-size:28px; font-weight:800; color:#059669; }
    .divider { border:none; border-top:1px dashed #e5e7eb; margin:24px 0; }
    .terbilang-box { background:#f9fafb; border-radius:10px; padding:16px 20px; }
    .terbilang-box .lbl { font-size:11px; color:#9ca3af; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:6px; }
    .terbilang-box .val { font-style:italic; color:#374151; font-size:13px; }
    .footer-section { display:flex; justify-content:space-between; align-items:flex-end; margin-top:32px; padding-top:24px; border-top:1px solid #f3f4f6; }
    .ttd-area { text-align:center; }
    .ttd-area .lbl { font-size:12px; color:#6b7280; margin-bottom:56px; }
    .ttd-area .name { font-size:13px; font-weight:600; border-top:1.5px solid #374151; padding-top:8px; min-width:160px; }
    .stamp { width:80px; height:80px; border-radius:50%; border:3px solid #059669; display:flex; align-items:center; justify-content:center; color:#059669; font-size:10px; font-weight:700; text-align:center; }
    @media print {
      body { background:#fff; padding:0; }
      .kwitansi-wrap { box-shadow:none; border-radius:0; }
      .print-btn { display:none; }
    }
  </style>
</head>
<body>
  <div class="kwitansi-wrap">
    <div class="kwitansi-header">
      <div class="brand">Kredio <span>— Motor Credit</span></div>
      <div class="kwitansi-title">Kwitansi Pembayaran Angsuran</div>
    </div>
    <div class="kwitansi-body">
      <div class="no-kwitansi">
        No. Kwitansi: <span>KWT-{{ str_pad($angsuran->id, 6, '0', STR_PAD_LEFT) }}-{{ $angsuran->angsuran_ke }}</span>
        &nbsp;&nbsp;|&nbsp;&nbsp;
        Tanggal Cetak: {{ now()->format('d/m/Y H:i') }}
      </div>

      <div class="info-grid">
        <div class="info-item">
          <label>Nama Pelanggan</label>
          <div class="val">{{ $angsuran->pengajuanKredit->pelanggan->nama_pelanggan ?? '-' }}</div>
        </div>
        <div class="info-item">
          <label>Tanggal Bayar</label>
          <div class="val">{{ $angsuran->tgl_bayar ? \Carbon\Carbon::parse($angsuran->tgl_bayar)->format('d MMMM Y') : '-' }}</div>
        </div>
        <div class="info-item">
          <label>Motor</label>
          <div class="val">{{ $angsuran->pengajuanKredit->motor->nama_motor ?? '-' }}</div>
        </div>
        <div class="info-item">
          <label>Angsuran Ke</label>
          <div class="val">{{ $angsuran->angsuran_ke }} dari {{ $angsuran->pengajuanKredit->jenisCicilan->lama_cicilan ?? '?' }} bulan</div>
        </div>
        <div class="info-item">
          <label>Keterangan</label>
          <div class="val">{{ $angsuran->keterangan ?? 'Pembayaran angsuran kredit motor' }}</div>
        </div>
      </div>

      <div class="total-box">
        <div>
          <div class="lbl">Total Pembayaran</div>
          <div style="font-size:12px;color:#6b7280;margin-top:2px;">Angsuran Ke-{{ $angsuran->angsuran_ke }}</div>
        </div>
        <div class="amt">Rp {{ number_format($angsuran->total_bayar, 0, ',', '.') }}</div>
      </div>

      <div class="terbilang-box">
        <div class="lbl">Terbilang</div>
        <div class="val">"{{ \App\Helpers\Terbilang::convert($angsuran->total_bayar) ?? 'Nominal pembayaran tersebut' }} Rupiah"</div>
      </div>

      <div class="footer-section">
        <div>
          <div style="font-size:12px;color:#9ca3af;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:6px;">Diterima Oleh</div>
          <div class="ttd-area">
            <div class="lbl">Marketing Kredio</div>
            <div class="name">( ________________________ )</div>
          </div>
        </div>
        <div style="text-align:center;">
          <div class="stamp">
            <div>LUNAS<br>✓</div>
          </div>
        </div>
        <div>
          <div style="font-size:12px;color:#9ca3af;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:6px;">Pelanggan</div>
          <div class="ttd-area">
            <div class="lbl">{{ $angsuran->pengajuanKredit->pelanggan->nama_pelanggan ?? '' }}</div>
            <div class="name">( ________________________ )</div>
          </div>
        </div>
      </div>

      <div style="text-align:center;margin-top:24px;font-size:11px;color:#d1d5db;">
        Kwitansi ini adalah bukti pembayaran yang sah dari Kredio — Motor Credit<br>
        Disimpan baik-baik sebagai bukti transaksi Anda
      </div>
    </div>
  </div>

  <div class="print-btn" style="position:fixed;bottom:24px;right:24px;">
    <button onclick="window.print()" style="background:#059669;color:#fff;border:none;border-radius:12px;padding:14px 28px;font-size:15px;font-weight:700;cursor:pointer;box-shadow:0 4px 16px rgba(5,150,105,0.4);">
      🖨️ Cetak Kwitansi
    </button>
  </div>
</body>
</html>
