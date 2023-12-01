<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolaHarian extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_polakerja',
        'toleransi_keterlambatan',
        'jadwal_harian_id'
    ];
    protected $appends = ['deskripsi'];
    
    protected $table = 'polahari';


    public function jadwal_harian(){

        return $this->hasMany(JadwalHarian::class,'polahari_id','id');

    }

    public function getDeskripsiAttribute()
    {
        $jumlahHariLibur = $this->jadwal_harian->where('pola_kerja', 'Hari Kerja')->count();
        $jumlahJadwalLibur = $this->jadwal_harian->where('pola_kerja', 'Jadwal Libur')->count();

        return $jumlahHariLibur . ' Hari Libur, ' . $jumlahJadwalLibur . ' Jadwal Libur';
    }


}
