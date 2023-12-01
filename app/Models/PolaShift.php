<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolaShift extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_polakerja',
        'toleransi_keterlambatan',
        'catatan',
        'warna',
        'jadwal_shift_id'
    ];
    
    protected $table = 'polashift';

    public function jadwal_shift()
    {
        return $this->hasOne(JadwalShift::class,'id','jadwal_shift_id');
        
    }

}
