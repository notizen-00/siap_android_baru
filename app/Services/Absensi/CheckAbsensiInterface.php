<?php 

namespace App\Services\Absensi;

interface CheckAbsensiInterface
{
    public function getResponse();

    public function setResponseData($key,$value);

    public function getResponseData();

    public function checkResult(): bool;

    public function setError($error);

    public function getErrorObject();
    
}