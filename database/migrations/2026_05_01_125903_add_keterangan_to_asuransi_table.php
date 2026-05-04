<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('asuransi', function (Blueprint $table) {
            if (!Schema::hasColumn('asuransi', 'keterangan')) {
                $table->text('keterangan')->nullable()->after('url_logo');
            }
        });
    }

    public function down(): void
    {
        Schema::table('asuransi', function (Blueprint $table) {
            $table->dropColumn('keterangan');
        });
    }
};