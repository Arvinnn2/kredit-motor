<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisMotor extends Model
{
    protected $table = 'jenis_motor';

    protected $fillable = ['merk', 'jenis', 'deskripsi_jenis', 'image_uri'];

    public function motor()
    {
        return $this->hasMany(Motor::class, 'idjenis');
    }
}