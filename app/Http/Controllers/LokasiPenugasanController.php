<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LokasiPenugasan;
use App\Models\LokasiKehadiran;
class LokasiPenugasanController extends Controller
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_lokasi)
    {
        $data = LokasiPenugasan::with('karyawan')->with('lokasi')->where('lokasi_id',$id_lokasi)->get();
        
        if($data->isEmpty()){
            $response = LokasiKehadiran::where('id',$id_lokasi)->get();
        }else{
            $response = $data;
        }

        return response()->json($response,200);

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
        $karyawan = $request->karyawan_id;
        $upsert = [];
        foreach($karyawan as $i)
        {   
            $upsert[] = [
                'lokasi_id'=>$request->lokasi_id,
                'karyawan_id'=>$i 
            ];
        }

        $proses = LokasiPenugasan::upsert($upsert,['lokasi_id','karyawan_id'],['lokasi_id']);

        if($proses){
            return to_route('lokasi.index');
        }else{
            return response()->json($upsert);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
