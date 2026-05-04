<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengiriman';

    protected $fillable = [
        'no_invoice', 'tgl_kirim', 'tgl_tiba', 'status_kirim',
        'nama_kurir', 'telpon_kurir', 'bukti_foto', 'keterangan', 'id_kredit',
    ];

    public function pengajuanKredit()
    {
        return $this->belongsTo(PengajuanKredit::class, 'id_kredit');
    }
}