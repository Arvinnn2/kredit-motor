<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bukti Pembayaran Angsuran</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    * { margin:0; padding:0; box-sizing:border-box; }
    body { font-family:'DM Sans',sans-serif; background:#f1f5f9; min-height:100vh; display:flex; flex-direction:column; align-items:center; justify-content:center; padding:30px 16px; }

    .bukti-card {
      background:#fff;
      width:100%;
      max-width:480px;
      border-radius:20px;
      overflow:hidden;
      box-shadow:0 8px 32px rgba(0,0,0,0.12);
    }

    .bukti-header {
      background:linear-gradient(135deg,#1969ff 0%,#6366f1 100%);
      padding:32px 36px 28px;
      color:#fff;
      text-align:center;
    }
    .brand-name { font-size:24px; font-weight:800; letter-spacing:-0.5px; }
    .bukti-title { font-size:13px; font-weight:500; opacity:0.8; text-transform:uppercase; letter-spacing:2px; margin-top:4px; }

    .status-badge {
      display:inline-flex;
      align-items:center;
      gap:8px;
      background:rgba(255,255,255,0.2);
      border:1.5px solid rgba(255,255,255,0.4);
      border-radius:100px;
      padding:8px 20px;
      margin-top:20px;
      font-size:13px;
      font-weight:700;
    }
    .check-icon { width:22px; height:22px; background:#10b981; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:12px; }

    .amount-section {
      text-align:center;
      padding:28px 36px;
      border-bottom:1px dashed #e5e7eb;
    }
    .amount-label { font-size:12px; color:#9ca3af; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; }
    .amount-value { font-size:38px; font-weight:800; color:#1a1a2e; margin-top:6px; letter-spacing:-1px; }

    .detail-section { padding:24px 36px; }
    .detail-row {
      display:flex;
      justify-content:space-between;
      align-items:flex-start;
      padding:10px 0;
      border-bottom:1px solid #f3f4f6;
      gap:12px;
    }
    .detail-row:last-child { border-bottom:none; }
    .detail-label { font-size:12px; color:#9ca3af; font-weight:600; flex-shrink:0; }
    .detail-value { font-size:13px; font-weight:600; color:#1a1a2e; text-align:right; word-break:break-word; }

    .footer-note {
      background:#f8fafc;
      padding:18px 36px;
      text-align:center;
      border-top:1px solid #f1f5f9;
    }
    .footer-note p { font-size:11px; color:#9ca3af; line-height:1.6; }

    .action-buttons {
      display:flex;
      gap:12px;
      width:100%;
      max-width:480px;
      margin-top:20px;
    }
    .btn-print {
      flex:1;
      padding:14px;
      background:#1969ff;
      color:#fff;
      border:none;
      border-radius:12px;
      font-size:14px;
      font-weight:700;
      cursor:pointer;
      display:flex;
      align-items:center;
      justify-content:center;
      gap:8px;
      text-decoration:none;
    }
    .btn-back {
      flex:1;
      padding:14px;
      background:#fff;
      color:#374151;
      border:1.5px solid #e5e7eb;
      border-radius:12px;
      font-size:14px;
      font-weight:600;
      cursor:pointer;
      display:flex;
      align-items:center;
      justify-content:center;
      gap:8px;
      text-decoration:none;
    }

    @media print {
      body { background:#fff; padding:0; justify-content:flex-start; }
      .action-buttons { display:none; }
      .bukti-card { box-shadow:none; max-width:100%; border-radius:0; }
    }
  </style>
</head>
<body>

<div class="bukti-card">
  <div class="bukti-header">
    <div class="brand-name">Kredio</div>
    <div class="bukti-title">Bukti Pembayaran Angsuran</div>
    <div class="status-badge">
      <div class="check-icon">✓</div>
      PEMBAYARAN BERHASIL
    </div>
  </div>

  <div class="amount-section">
    <div class="amount-label">Jumlah Dibayar</div>
    <div class="amount-value">Rp {{ number_format($angsuran->total_bayar, 0, ',', '.') }}</div>
  </div>

  <div class="detail-section">
    <div class="detail-row">
      <span class="detail-label">No. Transaksi</span>
      <span class="detail-value" style="color:#1969ff;">TRX-{{ str_pad($angsuran->id, 8, '0', STR_PAD_LEFT) }}</span>
    </div>
    <div class="detail-row">
      <span class="detail-label">Tanggal Bayar</span>
      <span class="detail-value">{{ \Carbon\Carbon::parse($angsuran->tgl_bayar)->format('d/m/Y') }}</span>
    </div>
    <div class="detail-row">
      <span class="detail-label">Nama Pelanggan</span>
      <span class="detail-value">{{ $angsuran->pengajuanKredit->pelanggan->nama_pelanggan ?? '-' }}</span>
    </div>
    <div class="detail-row">
      <span class="detail-label">Motor</span>
      <span class="detail-value">{{ $angsuran->pengajuanKredit->motor->nama_motor ?? '-' }}</span>
    </div>
    <div class="detail-row">
      <span class="detail-label">Angsuran Ke</span>
      <span class="detail-value">{{ $angsuran->angsuran_ke }} dari {{ $angsuran->pengajuanKredit->jenisCicilan->lama_cicilan ?? '?' }} bulan</span>
    </div>
    <div class="detail-row">
      <span class="detail-label">Keterangan</span>
      <span class="detail-value">{{ $angsuran->keterangan ?? 'Pembayaran angsuran kredit motor' }}</span>
    </div>
    <div class="detail-row">
      <span class="detail-label">Dicetak</span>
      <span class="detail-value">{{ now()->format('d/m/Y H:i') }}</span>
    </div>
  </div>

  <div class="footer-note">
    <p>Simpan bukti ini sebagai tanda pembayaran yang sah.<br>Terima kasih telah membayar angsuran tepat waktu 🙏</p>
  </div>
</div>

<div class="action-buttons">
  <button class="btn-print" onclick="window.print()">
    🖨️ Cetak / Simpan PDF
  </button>
  <a class="btn-back" href="{{ route('client.angsuran.index') }}">
    ← Kembali
  </a>
</div>

</body>
</html>
