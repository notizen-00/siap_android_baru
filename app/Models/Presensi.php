<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'jenis_presensi',
        'jam_presensi',
        'status_presensi'
    ];

    protected $table = 'presensi';
}
