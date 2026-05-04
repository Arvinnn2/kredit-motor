<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanKredit extends Model
{
    protected $table = 'pengajuan_kredit';

    protected $fillable = [
        'tgl_pengajuan_kredit', 'id_pelanggan', 'id_motor',
        'harga_cash', 'dp', 'id_jenis_cicilan', 'harga_kredit',
        'id_asuransi', 'biaya_asuransi_perbulan', 'cicilan_perbulan',
        'url_kk', 'url_ktp', 'url_npwp', 'url_slip_gaji', 'url_foto',
        'status_pengajuan', 'keterangan_status_pengajuan',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'id_motor');
    }

    public function jenisCicilan()
    {
        return $this->belongsTo(JenisCicilan::class, 'id_jenis_cicilan');
    }

    public function asuransi()
    {
        return $this->belongsTo(Asuransi::class, 'id_asuransi');
    }

    public function angsuran()
    {
        return $this->hasMany(Angsuran::class, 'id_kredit');
    }

    public function pengiriman()
    {
        return $this->hasOne(Pengiriman::class, 'id_kredit');
    }

    // Relasi ke tabel kredit (status aktif kredit)
    public function kredit()
    {
        return $this->hasOne(Kredit::class, 'id_pengajuan_kredit');
    }

    // Helper: hitung sisa kredit dari angsuran
    public function getSisaKreditAttribute(): float
    {
        $sudahBayar = $this->angsuran()->whereNotNull('tgl_bayar')->sum('total_bayar');
        $totalKredit = ($this->cicilan_perbulan + $this->biaya_asuransi_perbulan) * ($this->jenisCicilan->lama_cicilan ?? 1);
        return max(0, $totalKredit - $sudahBayar);
    }
}
