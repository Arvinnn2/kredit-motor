<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kredit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengajuan_kredit');
            $table->unsignedBigInteger('id_metode_bayar')->nullable();
            $table->date('tgl_mulai_kredit')->nullable();
            $table->date('tgl_selesai_kredit')->nullable();
            $table->double('sisa_kredit')->default(0);
            $table->enum('status_kredit', ['Dicicil', 'Macet', 'Lunas'])->default('Dicicil');
            $table->string('keterangan_status_kredit')->nullable();
            $table->timestamps();

            $table->foreign('id_pengajuan_kredit')
                ->references('id')->on('pengajuan_kredit')
                ->onDelete('cascade');

            $table->foreign('id_metode_bayar')
                ->references('id')->on('metode_bayar')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kredit');
    }
};
