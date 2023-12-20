<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\KaryawanController;
use App\Http\Controllers\Api\AbsensiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::controller(LoginController::class)->group(function(){
    Route::post('login', 'login');
});
        
Route::middleware('auth:sanctum')->group( function () {
    Route::resource('karyawan_api', KaryawanController::class);
    Route::get('karyawan/lokasi_penugasan', [KaryawanController::class,'getLokasiPenugasan']);
    Route::resource('absensi',AbsensiController::class);
    Route::post('doAbsen',[AbsensiController::class,'doAbsen']);
    Route::post('logout', 'App\Http\Controllers\Api\LoginController@logout');
});
