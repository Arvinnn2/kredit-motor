<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Tambahkan status 'DP Dibayar' ke enum pengajuan_kredit
        DB::statement("ALTER TABLE pengajuan_kredit MODIFY COLUMN status_pengajuan
            ENUM(
                'Menunggu Konfirmasi',
                'Diterima',
                'DP Dibayar',
                'Diproses',
                'Selesai',
                'Dibatalkan Pembeli',
                'Dibatalkan Penjual',
                'Bermasalah'
            ) DEFAULT 'Menunggu Konfirmasi'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE pengajuan_kredit MODIFY COLUMN status_pengajuan
            ENUM(
                'Menunggu Konfirmasi',
                'Diproses',
                'Dibatalkan Pembeli',
                'Dibatalkan Penjual',
                'Bermasalah',
                'Diterima',
                'Selesai'
            ) DEFAULT 'Menunggu Konfirmasi'");
    }
};
