<?php

namespace App\Providers;

use App\Services\SupabaseAuthService;
use App\Services\SupabaseClient;
use App\Services\SupabaseStorageService;
use Illuminate\Support\ServiceProvider;

class SupabaseServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SupabaseClient::class, function ($app) {
            return new SupabaseClient(
                url:            (string) config('supabase.url'),
                anonKey:        (string) config('supabase.anon_key'),
                serviceRoleKey: (string) config('supabase.service_role_key'),
                timeout:        (int)    config('supabase.http.timeout', 15),
            );
        });

        $this->app->singleton(SupabaseAuthService::class, function ($app) {
            return new SupabaseAuthService($app->make(SupabaseClient::class));
        });

        $this->app->singleton(SupabaseStorageService::class, function ($app) {
            return new SupabaseStorageService(
                client: $app->make(SupabaseClient::class),
                bucket: (string) config('supabase.storage.bucket'),
            );
        });
    }

    public function boot(): void
    {
        //
    }
}
