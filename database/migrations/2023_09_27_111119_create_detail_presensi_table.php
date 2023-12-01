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
        Schema::create('detail_presensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('presensi_id');
            $table->foreign('presensi_id')->references('id')->on('presensi');
            $table->text('detail_perangkat')->nullable();
            $table->text('detail_lokasi');
            $table->string('foto_presensi');
            $table->text('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_presensi');
    }
};
