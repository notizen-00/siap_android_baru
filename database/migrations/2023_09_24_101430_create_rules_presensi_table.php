<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rules_presensi', function (Blueprint $table) {
            $table->id();
            $table->integer('validasi_perangkat');
            $table->integer('masuk_presensi_sebelum');
            $table->integer('masuk_presensi_setelah');
            $table->integer('keluar_presensi');
            $table->text('rules_jadwal_lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rules_presensi');
    }
};
