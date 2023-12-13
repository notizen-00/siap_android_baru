<?php

namespace App\Services\Absensi;

use App\Services\Absensi\CheckAbsensiInterface;
use App\Models\Device;

class CheckPerangkat implements CheckAbsensiInterface
{

    private $data = [];
    private $device;
    private $karyawanId;
    private $check;
    private $error;
    public function __construct($karyawanId,$device)
    {
        $this->device = $device;
        $this->karyawanId = $karyawanId;
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

        $device = $this->checkDevice();
        if ($device) {
          
            return true;
        }else{
            $this->setError('Perangkat/Device Tidak Valid');
            return false;
        }

    }


    public function getErrorObject()
    {
       return $this->error;
    }

    private function dataDevice():array
    {
        $data = [];
 
            $data['nama_perangkat'] = $this->device['manufacturer'].'-'.$this->device['model'];
            $data['karyawan_id'] = $this->karyawanId;
            $data['model_perangkat'] = $this->device['model'];
            $data['id_device'] = $this->device['id'];
            $data['manufaktur_perangkat'] = $this->device['manufacturer'];
    
        
        return $data;
    }
    private function checkDevice():bool
    {
        $device = Device::where('karyawan_id',$this->karyawanId)->first();

        if(empty($device)){

             $this->insertDevice();
             return true;

        }else{

            if($device->id_device == $this->device['id']){
                
                $this->setResponseData('id_device', $this->device['id']);
                    return true;
            }else{
                    return false;
            }
        
        }
    }

    private function insertDevice()
    {

       return Device::insert($this->dataDevice());
        
    }
 

    
}