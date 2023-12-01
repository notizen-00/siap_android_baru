<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiPenugasan extends Model
{
    use HasFactory;

    protected $fillable = [
        'lokasi_id',
        'karyawan_id',

    ];
    protected $table = 'penugasan_karyawan';

    public function lokasi()
    {
        return $this->hasOne(LokasiKehadiran::class,'id','lokasi_id');
    }

    public function karyawan()
    {
        return $this->hasOne(Karyawan::class,'id','karyawan_id');
    }
}
