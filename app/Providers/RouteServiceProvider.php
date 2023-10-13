<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'))
                ->group(base_path('routes/API/auth/auth.php'))
                ->group(base_path('routes/API/attraction/attraction.php'))
                ->group(base_path('routes/API/guest/guest.php'))
                ->group(base_path('routes/API/price/index.php'))
                ->group(base_path('routes/API/guest/guest_attraction.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'))
                ->group(base_path('routes/activities/index.php'))
                ->group(base_path('routes/attractions/index.php'))
                ->group(base_path('routes/export/index.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
