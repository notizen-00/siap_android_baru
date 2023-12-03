<?php

namespace App\Services\Absensi;

use App\Models\LokasiPenugasan;
use App\Services\Absensi\CheckAbsensiInterface;

class CheckLokasi implements CheckAbsensiInterface
{
    private $data = [];
    private $karyawan_id;
    private $lokasiKaryawan;
    private $lokasiPenugasan;
    private $radius;
    private $check;
    private $error;

    public function __construct($lokasiKaryawan, $lokasiPenugasan, $radius)
    {

        $this->lokasiKaryawan = $lokasiKaryawan;
        $this->lokasiPenugasan = $lokasiPenugasan;
        $this->radius = $radius;

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
        $distance = $this->calculateHaversineDistance(
            $this->lokasiKaryawan['lat'],
            $this->lokasiKaryawan['lng'],
            $this->lokasiPenugasan['lat'],
            $this->lokasiPenugasan['lng']
        );

        if ($distance > $this->radius) {
            $this->setError('Anda tidak berada di lokasi penugasan');
            return false;
        }

        $this->setResponseData('lokasi_absen', [
            'lat'=>$this->lokasiKaryawan['lat'],
            'lng'=>$this->lokasiKaryawan['lng']
        ]);
        return true;
    }


    public function getErrorObject()
    {
        return $this->error;
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
