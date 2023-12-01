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
        Schema::create('polashift', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jadwal_shift_id');
            $table->foreign('jadwal_shift_id')->references('id')->on('jadwal_shift');
            $table->string('nama_polakerja');
            $table->integer('toleransi_keterlambatan');
            $table->string('catatan')->nullable();
            $table->string('warna')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift');
    }
};
