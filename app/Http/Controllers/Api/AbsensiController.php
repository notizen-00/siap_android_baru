<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\Absensi\CheckLokasi;
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Save the image and get the file path
        $imageFilePath = $this->simpanImage($request->image);
       
        // Additional data needed for CheckLokasiService, you need to customize this based on your actual data structure
        $lokasiKaryawan = [
            'latitude' => $request->lokasi_karyawan['lat'],
            'longitude' => $request->lokasi_karyawan['lng'],
            // ... other relevant data
        ];
      
        $lokasiPenugasan = [
            'latitude' => $request->lokasi_penugasan['lat'],
            'longitude' => $request->lokasi_penugasan['lng'],
            // ... other relevant data
        ];

        $radius = 10; // Set your desired radius

        // Instantiate CheckLokasiService
        $checkLokasiService = new CheckLokasi(
            $request->input('karyawan_id'),
            $lokasiKaryawan,
            $lokasiPenugasan,
            $radius
        );

      
        $lokasiServiceData = $checkLokasiService->getData([
            'nama_divisi' => 'Your Divisi Name',
            'sistem_kerja' => 1, // or 2 based on your logic
            'pola_kerja' => [
                'id' => 1, // Example ID
                // ... other relevant data
            ],
         
        ]);

        $response = array_merge($lokasiServiceData);

        return response()->json($response);
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
