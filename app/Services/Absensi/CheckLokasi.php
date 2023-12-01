<?php

namespace App\Services\Absensi;

use App\Models\LokasiPenugasan;

class CheckLokasi
{
    protected $karyawan_id;
    protected $lokasi_karyawan;
    protected $lokasi_penugasan;
    protected $radius;

    public function __construct($karyawan_id, $lokasi_karyawan, $lokasi_penugasan, $radius)
    {
        $this->karyawan_id = $karyawan_id;
        $this->lokasi_karyawan = $lokasi_karyawan;
        $this->lokasi_penugasan = $lokasi_penugasan;
        $this->radius = $radius;
    }

    public function getData($data): array
    {
        $this->data = $data;

        return $this->normalizeData();
    }

    public function normalizeData(): array
    {
        $data['nama_divisi'] = $this->data['nama_divisi'];
        $data['sistem_kerja'] = $this->data['sistem_kerja'] == 1 ? 'Harian' : 'Shift';

        if ($this->data['sistem_kerja'] == 1) {
            $data['polahari_id'] = $this->data['pola_kerja']['id'];
        }

        $distance = $this->calculateHaversineDistance(
            $this->lokasi_karyawan['latitude'],
            $this->lokasi_karyawan['longitude'],
            $this->lokasi_penugasan['latitude'],
            $this->lokasi_penugasan['longitude']
        );

        $data['is_within_radius'] = $distance <= $this->radius;

        return $data;
    }

    private function calculateHaversineDistance($lat1, $lon1, $lat2, $lon2)
    {
        $R = 6371; // Radius of the Earth in kilometers

        $dlat = deg2rad($lat2 - $lat1);
        $dlon = deg2rad($lon2 - $lon1);

        $a = sin($dlat / 2) * sin($dlat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dlon / 2) * sin($dlon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $R * $c; // Distance in kilometers

        return $distance;
    }
}
