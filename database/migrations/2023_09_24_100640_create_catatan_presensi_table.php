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
        Schema::create('catatan_presensi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_catatan');
            $table->enum('jenis_catatan',['presensi_masuk','presensi_keluar','presensi_mulai_lembur','presensi_selesai_lembur']);
            $table->string('file_catatan')->nullable();
            $table->integer('status_catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatan_presensi');
    }
};
