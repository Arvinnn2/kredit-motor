<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengiriman', function (Blueprint $table) {
            if (!Schema::hasColumn('pengiriman', 'tgl_kirim')) {
                $table->date('tgl_kirim')->nullable()->after('no_invoice');
            }
            if (!Schema::hasColumn('pengiriman', 'tgl_tiba')) {
                $table->date('tgl_tiba')->nullable()->after('tgl_kirim');
            }
        });
    }

    public function down(): void {}
};