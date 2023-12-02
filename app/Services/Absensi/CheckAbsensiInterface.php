<?php 

namespace App\Services\Absensi;

interface CheckAbsensiInterface
{
    public function getResponse();

    public function checkResult(): bool;
    
}