<?php

namespace App\Services;

class RulesService
{

    protected $data;

    public function getDataRules($data):array
    {
        $this->data = $data;
       
        return $this->normalizeData();

    }


    public function normalizeData():array
    {
       $data['validasi_perangkat'] = $this->data['validasi_perangkat'];
       $data['sistem_kerja'] = $this->data['sistem_kerja'] == 1 ? 'Harian' : 'Shift';
       if($this->data['sistem_kerja'] == 1){
        $data['polahari_id'] = $this->data['pola_kerja']['id'];
       }
    
       return $data;

    }

   
}
