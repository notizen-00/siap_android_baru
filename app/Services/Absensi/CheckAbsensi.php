<?php

namespace App\Services\Absensi;

use App\Services\Absensi\CheckAbsensiInterface;
use App\Models\Presensi;
use Carbon\Carbon;
class CheckAbsensi implements CheckAbsensiInterface
{

    private $data = [];
    private $karyawanId;
    private $jenis_presensi;
    private $check;
    private $hari_ini;
    private $jam_now;
    private $error;
    public function __construct($karyawanId,$jenis_presensi)
    {
        setlocale(LC_ALL, 'IND');
        $this->rules_presensi = (object)[];
        $this->hari_ini = Carbon::now()->formatLocalized('%A');
        $this->jam_now = Carbon::now()->format('H:i:s');
        $this->karyawanId = $karyawanId;
        $this->jenis_presensi = $jenis_presensi;
    }

    public function setError($error)
    {
        $this->error = $error;
    }

    public function setResponseData($name,$value)
    {
        return $this->data[$name] = $value;
    }
    public function getResponseData()
    {
        return $this->data;
    }

    public function getResponse()
    {
        return $this->checkResult() ? true : $this->getErrorObject();
    }

    public function checkResult(): bool
    {

        $device = $this->checkAbsensi();
        if ($device) {
            return true;
        }else{
            $this->setError('Anda sudah Absen '.$this->jenis_presensi.' hari ini');
            return false;
        }

    }


    public function getErrorObject()
    {
        return $this->error;
    }


    private function checkAbsensi():bool
    {
        $absensi = Presensi::where('jenis_presensi',$this->jenis_presensi)->where('karyawan_id',$this->karyawanId)->whereDate('created_at',now()->today())->first();
        
        if(empty($absensi)){
            return true;
        }else{
            return false;
        }
    }


    
}