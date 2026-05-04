<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan_kredit', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pengajuan_kredit');
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_motor');
            $table->integer('harga_cash');
            $table->integer('dp');
            $table->unsignedBigInteger('id_jenis_cicilan');
            $table->double('harga_kredit');
            $table->unsignedBigInteger('id_asuransi');
            $table->double('biaya_asuransi_perbulan');
            $table->double('cicilan_perbulan');
            $table->string('url_kk')->nullable();
            $table->string('url_ktp')->nullable();
            $table->string('url_npwp')->nullable();
            $table->string('url_slip_gaji')->nullable();
            $table->string('url_foto')->nullable();
            $table->enum('status_pengajuan', [
                'Menunggu Konfirmasi', 'Diproses',
                'Dibatalkan Pembeli', 'Dibatalkan Penjual',
                'Bermasalah', 'Diterima'
            ])->default('Menunggu Konfirmasi');
            $table->string('keterangan_status_pengajuan')->nullable();
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id')->on('pelanggan')->onDelete('cascade');
            $table->foreign('id_motor')->references('id')->on('motor')->onDelete('cascade');
            $table->foreign('id_jenis_cicilan')->references('id')->on('jenis_cicilan')->onDelete('cascade');
            $table->foreign('id_asuransi')->references('id')->on('asuransi')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_kredit');
    }
};