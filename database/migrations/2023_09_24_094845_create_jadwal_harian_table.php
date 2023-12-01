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
        Schema::create('jadwal_harian', function (Blueprint $table) {
            $table->id();
            $table->integer('polahari_id');
            $table->string('hari');
            $table->enum('pola_kerja',['Hari Kerja','Jadwal Libur']);
            $table->time('jam_masuk')->nullable();
            $table->time('jam_keluar')->nullable();
            $table->time('mulai_istirahat')->nullable();
            $table->time('selesai_istirahat')->nullable();
            $table->integer('maks_istirahat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_kerja');
    }
};
