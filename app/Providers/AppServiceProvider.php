<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PolaHarianService;
use App\Services\DivisiService;
use App\Services\RuleService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('PolaHarianService', function ($app) {
            return new PolaHarianService();
        });
        $this->app->singleton('DivisiService', function ($app) {
            return new DivisiService();
        });
        $this->app->singleton('RuleService', function ($app) {
            return new RuleService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
