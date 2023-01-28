<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
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
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware(['web', 'auth:web'])
                ->prefix('profile')
                ->name('profile.')
                ->group(base_path('routes/profile.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        Route::bind('page', fn ($value) => Page::isActive()->hasSlug($value)->firstOrFail());
        Route::bind('product', fn ($value) => Product::isActive()->hasSlug($value)->firstOrFail());
        Route::bind('category', fn ($value) => ProductCategory::isActive()->hasSlug($value)->firstOrFail());
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
