<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE pengajuan_kredit MODIFY COLUMN status_pengajuan ENUM('Menunggu Konfirmasi','Diproses','Dibatalkan Pembeli','Dibatalkan Penjual','Bermasalah','Diterima','Selesai') DEFAULT 'Menunggu Konfirmasi'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE pengajuan_kredit MODIFY COLUMN status_pengajuan ENUM('Menunggu Konfirmasi','Diproses','Dibatalkan Pembeli','Dibatalkan Penjual','Bermasalah','Diterima') DEFAULT 'Menunggu Konfirmasi'");
    }
};