<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::post('/apis/login', 'App\Http\Controllers\Api\LoginController@login');
   


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    $controller = 'App\Http\Controllers';
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    
    Route::resource('polakerja/harian',$controller.'\PolaHarianController');
    Route::resource('polakerja/shift',$controller.'\PolaShiftController');
    Route::resource('kelola_karyawan/divisi',$controller.'\DivisiController');
    Route::resource('kelola_karyawan/karyawan',$controller.'\KaryawanController');
    Route::resource('kelola_karyawan/lokasi',$controller.'\LokasiKehadiranController');
    Route::resource('kehadiran',$controller.'\KehadiranController');
    
});
