<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PolaShift;
use App\Models\JadwalShift;
use App\Http\Requests\PolaShiftStoreRequest;
use Inertia\Inertia;

class PolaShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PolaShift::with('jadwal_shift')->get();
        return Inertia::render('PolaKerja/Shift/Index',[
            'listData'=>$data
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
    public function store(PolaShiftStoreRequest $request)
    {
      
        $validated = $request->validated();
    
        $data_jadwalshift = $request->only(['jam_masuk', 'jam_keluar', 'mulai_istirahat', 'selesai_istirahat', 'maks_istirahat']);
    
        $jadwalShiftId = JadwalShift::insertGetId($data_jadwalshift);
    
        if (!$jadwalShiftId) {
            return redirect('shift.index')->with('error', 'Gagal Insert Jadwal Shift');
        }

        $data_polashift = $request->only(['nama_polakerja', 'toleransi_keterlambatan', 'catatan', 'warna']);
    
        $data_polashift['jadwal_shift_id'] = $jadwalShiftId;
    
        $insert_polashift = PolaShift::create($data_polashift);
    
        if (!$insert_polashift) {
            return redirect('shift.index')->with('error', 'Gagal Insert Pola Shift');
        }
    
        return to_route('shift.index');
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
