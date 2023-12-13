<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AbsensiRequest;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Presensi;
use App\Services\Absensi\CheckLokasi;
use App\Services\Absensi\CheckPerangkat;
use App\Services\Absensi\CheckWaktu;

class AbsensiController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function simpanImage($base64Data) {
   
        $binaryData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Data));
    
        $filePath = 'image_presensi/' . uniqid() . '.jpg'; 
        Storage::disk('public')->put($filePath, $binaryData);
    
        return $filePath; 
    }

    public function doAbsen(Request $request)
    {
        $imageFilePath = $this->simpanImage($request->image);

        $presensi = Presensi::create([
            'karyawan_id'=>$request->karyawan_id,
            'image'=>$imageFilePath,
            
        ]);

        return response()->json($request->device_id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AbsensiRequest $request)
    {
        $validated = $request->validated();


        $lokasiKaryawan = $validated['lokasi_karyawan'];
        $device = $validated['device'];
        $lokasiPenugasan = $validated['lokasi_penugasan'];
        $radius = $validated['radius'];
        $karyawanId = $validated['karyawan_id'];
        $deviceId = $validated['device_id'];

        
        
        $lokasiService = app(CheckLokasi::class, compact('lokasiPenugasan', 'lokasiKaryawan', 'radius'));
        $resultLokasi = $lokasiService->getResponse();

        $waktuService = app(CheckWaktu::class, compact('karyawanId'));      
        $resultWaktu = $waktuService->getResponse();

        $perangkatService = app(CheckPerangkat::class, compact('karyawanId' , 'device'));      
        $resultPerangkat = $perangkatService->getResponse();
        // return response()->json($resultPerangkat);
        if($resultLokasi === true && $resultPerangkat === true && $resultWaktu === true)
        {

            $response = array_merge(
                $waktuService->getResponseData(),
                $lokasiService->getResponseData(),
                $perangkatService->getResponseData()
            );
            // $response = 'Check Lokasi dan device valid Silahkan ambil Foto';
        
            return  $this->sendResponse($response,'test');
            

        }else{

            $errors = [];

            if ($resultLokasi !== true) {
                $errors['lokasi'] = $resultLokasi;
            }

            if ($resultPerangkat !== true) {
                $errors['perangkat'] = $resultPerangkat;
            }
            
            if ($resultWaktu !== true) {
                $errors['waktu'] = $resultWaktu;
            }
            
            return $this->sendError('Absen Gagal Di Simpan', $errors, 201);

        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
