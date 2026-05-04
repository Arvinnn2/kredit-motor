<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSetting extends Model
{
    protected $table = 'hero_settings';
    protected $fillable = ['judul', 'subjudul', 'deskripsi', 'gambar', 'teks_tombol'];
}
