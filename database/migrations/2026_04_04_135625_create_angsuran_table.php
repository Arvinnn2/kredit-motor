<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('angsuran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kredit');
            $table->date('tgl_bayar')->nullable();
            $table->integer('angsuran_ke');
            $table->double('total_bayar');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_kredit')->references('id')->on('pengajuan_kredit')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('angsuran');
    }
};