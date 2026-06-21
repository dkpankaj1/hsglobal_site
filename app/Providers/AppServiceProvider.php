<?php

namespace App\Providers;

use App\Models\AdmissionSetting;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();

        View::share('setting', Setting::firstOrCreate([]));
        View::share('admission_setting', AdmissionSetting::firstOrCreate([]));
    }
}
