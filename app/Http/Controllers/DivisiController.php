<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\DivisiStoreRequest;
use App\Models\PolaHarian;
use App\Services\DivisiService;
use App\Models\RulesPresensi;
use App\Models\Divisi;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $listItem = PolaHarian::with('jadwal_harian')->get();
        $listData = Divisi::with('pola_hari')->get();

        
        return Inertia::render('Divisi/Index',[
            'listItem'=>$listItem,
            'listData'=>$listData
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
    public function store(DivisiStoreRequest $request,DivisiService $service)
    {   

        $validated = $request->validated();

        $request_divisi = $request->only(['nama_divisi', 'sistem_kerja','pola_kerja']); 
        $data_rule = $request->only(['masuk_presensi_sebelum','validasi_perangkat','masuk_presensi_setelah','keluar_presensi']);
        
        $insert_rule = RulesPresensi::create($data_rule);

        $rule_id = $insert_rule->id;

        $data_divisi = $service->getData($request_divisi) + ['rules_presensi_id' => $rule_id];

        $insert_divisi = Divisi::create($data_divisi);

        if($insert_divisi)
        {
            return to_route('divisi.index');
        }else{
            return to_route('divisi.index');
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
