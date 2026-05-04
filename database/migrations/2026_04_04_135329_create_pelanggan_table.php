<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->string('email');
            $table->string('katakunci', 15)->nullable();
            $table->string('no_telp', 15)->nullable();
            $table->string('alamat1')->nullable();
            $table->string('kota1')->nullable();
            $table->string('propinsi1')->nullable();
            $table->string('kodepos1', 10)->nullable();
            $table->string('alamat2')->nullable();
            $table->string('kota2')->nullable();
            $table->string('propinsi2')->nullable();
            $table->string('kodepos2', 10)->nullable();
            $table->string('alamat3')->nullable();
            $table->string('kota3')->nullable();
            $table->string('propinsi3')->nullable();
            $table->string('kodepos3', 10)->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};