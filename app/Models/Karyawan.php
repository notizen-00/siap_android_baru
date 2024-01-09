<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_karyawan',
        'users_id',
        'divisi_id',
        'file_identitas',
        'jabatan',
        'sisa_cuti',
        'tgl_lahir',
        'tgl_mulai_bekerja',
        'foto_profil',
        'no_hp',
        'jenis_kelamin',
        'no_identitas',
        'jenis_identitas',
        'zona_waktu'
    ];

    protected $table = 'karyawan';

    // public function divisi()
    // {
    //     return $this->hasOne(Divisi::class,'id','divisi_id');
    // }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id', 'id');
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','users_id');
    }
    public function presensiToday()
    {
        return $this->hasOne(Presensi::class, 'karyawan_id', 'id')
        ->whereDate('created_at', today());
    }

    public function lokasi_penugasan()
    {
        return $this->hasOne(LokasiPenugasan::class,'users_id','users_id');
    }
}
