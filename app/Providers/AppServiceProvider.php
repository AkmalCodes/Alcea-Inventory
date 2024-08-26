<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\Authenticate;

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
        // Register middleware here
        $this->app['router']->aliasMiddleware('auth.guard', Authenticate::class); // custom auth middleware

    }
}
