<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Absensi\AbsensiService;
use App\Services\Absensi\CheckAbsensiInterface;
use App\Services\Absensi\CheckLokasi;
use App\Services\Absensi\CheckPerangkat;
use App\Services\Absensi\CheckWaktu;

class AbsensiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CheckAbsensiInterface::class, function ($app) {
            return $app->make(CheckLokasi::class,[
                'lokasiKaryawan'=>$lokasiKaryawan
            ]);
        });

        $this->app->singleton(CheckAbsensiInterface::class, function ($app) {
            return $app->make(CheckPerangkat::class);
        });

        $this->app->singleton(CheckAbsensiInterface::class, function ($app) {
            return $app->make(CheckWaktu::class);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
