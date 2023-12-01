<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KaryawanStoreRequest;
use App\Models\Karyawan;
use App\Models\Divisi;
use App\Models\User;
use Inertia\Inertia;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $listDivisi = Divisi::get();
        $listData = Karyawan::with('divisi')->with('user')->get();
        
        return Inertia::render('Karyawan/Index',[
            'listDivisi' => $listDivisi,
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
    public function store(KaryawanStoreRequest $request)
    {

        $validated = $request->validated();

        $data_user = $request->only(['email','name','password']);
        $data_user['role_id'] = 2;
        
        $user = User::create($data_user);

        $user_id = $user->id;

        $data_karyawan = $request->except(['email','name','password']);
        $data_karyawan['users_id'] = $user_id;

        $karyawan = Karyawan::create($data_karyawan);

        if($karyawan){
            return to_route('karyawan.index');
        }else{
            return to_route('karyawan.index');
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
