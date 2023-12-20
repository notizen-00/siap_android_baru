<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LokasiPenugasan;
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

        if($data){
            return response()->json($data,200);
        }else{
            return response()->json('gagal',201);
        }

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
