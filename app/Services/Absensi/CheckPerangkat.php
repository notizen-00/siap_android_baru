<?php

namespace App\Services\Absensi;

use App\Services\Absensi\CheckAbsensiInterface;

class CheckPerangkat implements CheckAbsensiInterface
{

    private $deviceId;
    private $check;
    public function __construct($deviceId)
    {
        $this->deviceId = $deviceId;
    }

    public function getResponse()
    {
        if($this->checkResult()){

            return true;
        }else{
            return 'Perangkat anda tidak valid';
        }
    }


    public function checkResult(): bool
    {
        
       return true;
    }
}