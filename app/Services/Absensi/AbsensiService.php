<?php

namespace App\Services\Absensi;

use Illuminate\Contracts\Container\Container;

use App\Services\Absensi\CheckLokasi;
use App\Services\Absensi\CheckPerangkat;
use App\Services\Absensi\CheckWaktu;
use App\Services\Absensi\CheckAbsensi;
use App\Services\Absensi\CheckAbsensiInterface;

class AbsensiService
{
    private $container;
    private $lokasiPenugasan;
    private $lokasiKaryawan;
    private $radius;
    private $karyawanId;
    private $deviceId;
    private $jenis_presensi;

    public function __construct(Container $container, $lokasiPenugasan, $lokasiKaryawan, $radius, $karyawanId, $deviceId,$jenis_presensi)
    {
        $this->container = $container;
        $this->lokasiPenugasan = $lokasiPenugasan;
        $this->lokasiKaryawan = $lokasiKaryawan;
        $this->radius = $radius;
        $this->karyawanId = $karyawanId;
        $this->deviceId = $deviceId;
        $this->jenis_presensi = $jenis_presensi;
    }

    public function passTest(): bool
    {
        $lokasiInstance = $this->resolve(CheckAbsensiInterface::class, CheckLokasi::class, [
            'lokasiKaryawan' => $this->lokasiKaryawan,
            'lokasiPenugasan' => $this->lokasiPenugasan,
            'radius' => $this->radius,
        ]);
        $perangkatInstance = $this->resolve(CheckAbsensiInterface::class, CheckPerangkat::class, [
            'deviceId' => $this->deviceId,
        ]);
        $waktuInstance = $this->resolve(CheckAbsensiInterface::class, CheckWaktu::class);
        $absensiInstance = $this->resolve(CheckAbsensiInterface::class, CheckAbsensi::class);

        $lokasiResult = $lokasiInstance->checkResult();
        $perangkatResult = $perangkatInstance->checkResult();
        $waktuResult = $waktuInstance->checkResult();
        $absensiResult = $absensiInstance->checkResult();
        return $lokasiResult && $perangkatResult && $waktuResult && $absensiResult;
    }

    protected function resolve($interface, $class, $parameters = [])
    {
        $resolvedClass = $this->container->make($class, $parameters);

        if (!$resolvedClass instanceof $interface) {
            throw new \InvalidArgumentException("Class {$class} must implement {$interface}");
        }

        return $resolvedClass;
    }
}
