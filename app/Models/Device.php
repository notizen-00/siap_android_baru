<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'nama_perangkat',
        'id_device',
        'model_perangkat',
        'manufaktur_perangkat'
    ];
    protected $table = 'device';

}
