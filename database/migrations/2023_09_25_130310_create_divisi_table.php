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
        Schema::create('divisi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_divisi');
            $table->integer('denda_keterlambatan');
            $table->enum('sistem_kerja',['Harian','Shift']);
            $table->unsignedBigInteger('polahari_id');
            $table->foreign('polahari_id')->references('id')->on('polahari')->nullable();
            $table->unsignedBigInteger('polashift_id');
            $table->foreign('polashift_id')->references('id')->on('polashift')->nullable();
            $table->unsignedBigInteger('catatan_presensi_id');
            $table->foreign('catatan_presensi_id')->references('id')->on('catatan_presensi');
            $table->unsignedBigInteger('rules_presensi_id');
            $table->foreign('rules_presensi_id')->references('id')->on('rules_presensi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('divisi');
    }
};
