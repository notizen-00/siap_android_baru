<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_divisi',
        'sistem_kerja',
        'polahari_id',
        'polashift_id',
        'catatan_presensi_id',
        'rules_presensi_id'
    ];

    protected $table = 'divisi';

    public function pola_hari()
    {
        return $this->hasOne(PolaHarian::class,'id','polahari_id');
    }
}
