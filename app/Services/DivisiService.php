<?php

namespace App\Services;

class DivisiService
{

    protected $data;


    public function getData($data):array
    {
        $this->data = $data;

        return $this->normalizeData();

    }


    public function normalizeData():array
    {
       $data['nama_divisi'] = $this->data['nama_divisi'];
       $data['sistem_kerja'] = $this->data['sistem_kerja'] == 1 ? 'Harian' : 'Shift';
       if($this->data['sistem_kerja'] == 1){
        $data['polahari_id'] = $this->data['pola_kerja']['id'];
       }
    
       return $data;
    }

   
}
