<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalShift extends Model
{
    use HasFactory;

    protected $fillable = [
        'jam_masuk',
        'jam_keluar',
        'mulai_istirahat',
        'selesai_istirahat',
        'maks_istirahat'
    ];
    protected $table = 'jadwal_shift';

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
