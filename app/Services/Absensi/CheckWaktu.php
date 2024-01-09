<?php

namespace App\Services\Absensi;


use App\Services\Absensi\CheckAbsensiInterface;
use App\Models\Karyawan;
use Carbon\Carbon;
use App\Models\PolaHarian;
use App\Models\PolaShift;
use App\Models\JadwalHarian;
use App\Models\JadwalShift;
use App\Models\Divisi;


class CheckWaktu implements CheckAbsensiInterface
{

    private $data = [];
    private $karyawanId;
    private $check;
    private $error;
    private $hari_ini;
    private $jam_now;
    private $divisi_id;
    private $polahariId;
    private $rules_presensi;

    public function __construct($karyawanId)
    {
        setlocale(LC_ALL, 'IND');
        $this->rules_presensi = (object)[];
        $this->hari_ini = Carbon::now()->formatLocalized('%A');
        $this->jam_now = Carbon::now()->format('H:i:s');
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
        
        return $this->validasiWaktuNow() ? true : $this->getErrorObject();
    }

    public function checkResult(): bool
    {
        
        $distance = true;

        if ($distance) {
            $this->setError('Check Waktu Tidak Valid');
            return false;
        }else{
            return true;
        }


    }


    public function getErrorObject()
    {
        return $this->error;
    }

    private function setRulesPresensi($data_rules):object
    {
        return $this->rules_presensi = $data_rules;
    }

    private function setPolahariId($id)
    {
        return $this->polahariId = $id;
    }
    private function getSistemKerja(){

        $karyawan = Karyawan::with('divisi')->find($this->karyawanId);
    

        $polakerja = $karyawan->divisi->sistem_kerja;

        $data_rules = Divisi::with('rules_presensi')->find($karyawan->divisi->id);

        $this->setRulesPresensi($data_rules);

        if($polakerja == 'Harian'){
        
        $this->setPolahariId($karyawan->divisi->polahari_id);
        
            return $polakerja;
        }else{
            return $polakerja;
        }
    }

    private function getRulesPresensi():object
    {
        return $this->rules_presensi;
    }
    private function getPolaKerja(): array
    {
        $result = [];
    
        if ($this->getSistemKerja() == 'Harian') {
            $data = JadwalHarian::where('hari', $this->hari_ini)->where('polahari_id', $this->polahariId)->first();
    
            if ($data && $data->pola_kerja == 'Hari Kerja') {
                $result = $data->toArray(); 
            }
        }
    
        return $result;
    }

    private function checkPolaKerjaSekarang():bool
    {

        $data = $this->getPolaKerja();
        $response = '';
            if(!empty($data)){

            // $this->setError($this->jam_now);
            $response = true;  
            }else{
            $this->setError('Hari ini Libur Tidak dapat absen');
            $response = false;
            }

            return $response;   
    }

    private function validasiWaktuNow(): bool
    {
        $data = $this->getPolaKerja();
        $rulesPresensi = $this->getRulesPresensi();
    
        if ($this->checkPolaKerjaSekarang()) {
   
            $differenceInSeconds = strtotime($data['jam_masuk']) - strtotime($this->jam_now);
    
            if ($differenceInSeconds < 0 || $differenceInSeconds > $rulesPresensi->masuk_presensi_setelah * 60) {
           
                if ($differenceInSeconds < 0) {
                    $latenessMinutes = abs(ceil($differenceInSeconds / 60));
                    $this->setResponseData('terlambat', $latenessMinutes);
                    $this->setResponseData('jam_presensi', $this->jam_now);
                    // $this->setError('Anda terlambat absen: ' . $latenessMinutes . ' menit');
                    $response = true;
                } else {
                    // Calculate how many minutes they need to wait
                    $remainingMinutes = ceil($differenceInSeconds / 60 - $rulesPresensi->masuk_presensi_setelah);
                    $this->setError('Tidak bisa absen kurang ' . $remainingMinutes . ' menit');
                    $response = false;
                }
    
            
            } 
        } else {
            $response = false;
        }
    
        return $response;
    }
    
    
    private function formatTime($seconds): string
    {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        $remainingSeconds = $seconds % 60;
    
        $formattedTime = '';
    
        if ($hours > 0) {
            $formattedTime .= $hours . ' jam ';
        }
    
        if ($minutes > 0) {
            $formattedTime .= $minutes . ' menit ';
        }
    
        if ($remainingSeconds > 0) {
            $formattedTime .= $remainingSeconds . ' detik';
        }
    
        return trim($formattedTime);
    }

 
}