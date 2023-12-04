<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LokasiKehadiran;
use App\Http\Requests\LokasiStoreRequest;
use Inertia\Inertia;

class LokasiKehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listData = LokasiKehadiran::with('lokasiPenugasan')->get();
        $listData->each(function ($lokasi) {
            $lokasi->total_karyawan = $lokasi->countLokasiPenugasanKaryawan();
        });
        return Inertia::render('Lokasi/Index',[
            'listData' => $listData
        ]);
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
    public function store(LokasiStoreRequest $request)
    {
        $validated = $request->validated();

        $data_lokasi = $request->all();

        $insert = LokasiKehadiran::create($data_lokasi);
        if($insert)
        {
            return to_route('lokasi.index');

        }else{
            return to_route('lokasi.index');
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

        $listDetail = LokasiKehadiran::findOrFail($id);

        return response()->json($listDetail);
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
        $data = LokasiKehadiran::findOrFail($id);
        
        try{
            $data->delete();
        }catch(Exception $e){
            return response()->json(array('error' => $e->getMessage));
        }
    
        return to_route('lokasi.index')->with('success','Data Berhasil Di Hapus');
    }
}
