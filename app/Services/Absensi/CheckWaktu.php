<?php

namespace App\Services\Absensi;


use App\Services\Absensi\CheckAbsensiInterface;


class CheckWaktu implements CheckAbsensiInterface
{

    private $data;
    private $karyawanId;
    private $check;

    public function __construct($karyawanId)
    {

        $this->karyawanId = $karyawanId;
    }
    
    public function getResponse()
    {
        if($this->checkResult()){

            return true;
        }else{
            return 'Waktu Anda Tidak Valid';
        }
    }

    public function checkResult(): bool
    {

       return true;
    }
}