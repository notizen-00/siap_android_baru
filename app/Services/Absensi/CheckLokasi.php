<?php

namespace App\Services\Absensi;

use App\Models\LokasiPenugasan;
use App\Services\Absensi\CheckAbsensiInterface;

class CheckLokasi implements CheckAbsensiInterface
{
    private $karyawan_id;
    private $lokasiKaryawan;
    private $lokasiPenugasan;
    private $radius;
    private $check;

    public function __construct($lokasiKaryawan, $lokasiPenugasan, $radius)
    {

        $this->lokasiKaryawan = $lokasiKaryawan;
        $this->lokasiPenugasan = $lokasiPenugasan;
        $this->radius = $radius;

    }

    public function getResponse()
    {
        if($this->checkResult()){

            return true;
        }else{
            return 'lokasi anda tidak valid';
        }
    }

    public function checkResult(): bool
    {

        $distance = $this->calculateHaversineDistance(
            $this->lokasiKaryawan['lat'],
            $this->lokasiKaryawan['lng'],
            $this->lokasiPenugasan['lat'],
            $this->lokasiPenugasan['lng']
        );

        // return $distance <= $this->radius ;
        return true;
    
    }

    private function calculateHaversineDistance($lat1, $lon1, $lat2, $lon2)
    {
        $R = 6371; // Radius of the Earth in kilometers

        $dlat = deg2rad($lat2 - $lat1);
        $dlon = deg2rad($lon2 - $lon1);

        $a = sin($dlat / 2) * sin($dlat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dlon / 2) * sin($dlon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $R * $c * 1000; // Distance in kilometers

        return $distance;
    }
}
