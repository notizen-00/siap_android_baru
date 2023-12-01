<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalHarian extends Model
{
    use HasFactory;

    protected $fillable = [
        'hari',
        'pola_kerja',
        'jam_masuk',
        'jam_keluar',
        'mulai_istirahat',
        'selesai_istirahat',
        'maks_istirahat',
    ];


    protected $table = 'jadwal_harian';

    public function getJamMasukAttribute($value)
    {
        if ($value === null) {
            return null; 
        }
    
        return \Carbon\Carbon::createFromFormat('H:i:s', $value)->format('H:i');
    }
    
    public function getJamKeluarAttribute($value)
    {
        if ($value === null) {
            return null; 
        }
    
        return \Carbon\Carbon::createFromFormat('H:i:s', $value)->format('H:i');
    }
    
    public function getMulaiIstirahatAttribute($value)
    {
        if ($value === null) {
            return null; 
        }
    
        return \Carbon\Carbon::createFromFormat('H:i:s', $value)->format('H:i');
    }
    
    public function getSelesaiIstirahatAttribute($value)
    {
        if ($value === null) {
            return null; 
        }
    
        return \Carbon\Carbon::createFromFormat('H:i:s', $value)->format('H:i');
    }
   
}
