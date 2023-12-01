<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RulesPresensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'validasi_perangkat',
        'masuk_presensi_sebelum',
        'masuk_presensi_setelah',
        'keluar_presensi',
        'rules_jadwal_lokasi'
    ];

    protected $table = 'rules_presensi';
}
