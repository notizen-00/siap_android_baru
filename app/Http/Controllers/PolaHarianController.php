<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\PolaHarian;
use App\Models\JadwalHarian;
use App\Http\Requests\PolaHarianStoreRequest;
use App\Services\PolaHarianService;

class PolaHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $polaHarianService;

     public function __construct(PolaHarianService $polaHarianService)
     {
         $this->polaHarianService = $polaHarianService;
     }
    public function index()
    {
        $data = PolaHarian::with('jadwal_harian')->get();
       
        return Inertia::render('PolaKerja/Harian/Index', [
            'listData' => $data,
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
    public function store(PolaHarianStoreRequest $request)
    {
        $validated = $request->validated();

        $data_polaharian = $request->only(['nama_polakerja', 'toleransi_keterlambatan']);
    
        $polahari_id = PolaHarian::create($data_polaharian);
        
       
        if (!$polahari_id) {
            return to_route('harian.index');
        }
        $idp = $polahari_id->id;
        $validated_jadwalharian = $request->only(['hari','pola_kerja','jam_masuk', 'jam_keluar', 'mulai_istirahat', 'selesai_istirahat', 'maks_istirahat']);

        $data_jadwalharian = $this->polaHarianService->normalizeData($validated_jadwalharian,$idp);

        $insert_jadwalharian = JadwalHarian::insert($data_jadwalharian);
    
        if (!$insert_jadwalharian) {
            return to_route('harian.index');
        }
    
        return to_route('harian.index');

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
