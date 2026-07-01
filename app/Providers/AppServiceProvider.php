<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Force HTTPS on Vercel (prevents mixed content blocking)
        if (env('VERCEL_ENV') || $this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
