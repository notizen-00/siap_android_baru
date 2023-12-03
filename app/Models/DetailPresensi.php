<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPresensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'presensi_id',
        'detail_perangkat',
        'detail_lokasi',
        'foto_presensi',
        'catatan'
    ];

    protected $table = 'detail_presensi';
}
