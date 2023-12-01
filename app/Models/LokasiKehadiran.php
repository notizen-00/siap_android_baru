<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiKehadiran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lokasi',
        'latitude',
        'longitude',
        'radius_lokasi'
    ];
    protected $table = 'lokasi';

    public function LokasiPenugasan()
    {
        return $this->belongsTo(LokasiPenugasan::class,'lokasi_id','id');
    }
}
