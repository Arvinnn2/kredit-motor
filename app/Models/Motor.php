<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $table = 'motor';

    protected $fillable = [
        'merk', 'nama_motor', 'idjenis', 'harga_jual',
        'deskripsi_motor', 'warna', 'kapasitas_mesin',
        'tahun_produksi', 'foto1', 'foto2', 'foto3', 'stok',
    ];

    public function jenisMotor()
    {
        return $this->belongsTo(JenisMotor::class, 'idjenis');
    }

    public function pengajuanKredit()
    {
        return $this->hasMany(PengajuanKredit::class, 'id_motor');
    }
}