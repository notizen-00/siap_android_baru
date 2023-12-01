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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedBigInteger('divisi_id');
            $table->foreign('divisi_id')->references('id')->on('divisi');
            $table->string('nama_karyawan');
            $table->string('jabatan')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('no_hp')->nullable();
            $table->enum('zona_waktu',['WIB','WIT','WITA']);
            $table->enum('jenis_identitas',['KTP','Passport','SIM','NRP','Lain-lain'])->nullable();
            $table->string('no_identitas')->nullable();
            $table->string('file_identitas')->nullable();
            $table->string('foto_profil')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->date('tgl_mulai_bekerja')->nullable();
            $table->integer('sisa_cuti')->nullable();
            $table->date('tgl_cuti_berakhir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
