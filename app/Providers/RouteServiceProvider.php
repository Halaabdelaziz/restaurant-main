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
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */

    public const HOME = '/';

    // public const HOME = 'redirects';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::group([
                'middleware' => ['api', 'cors'],
                'namespace' => $this->namespace,
                'prefix' => 'api',
            ], function ($router) {
         
                Route::get('/foods',[FoodController::class, "index"]);
                Route::post('/foods',[FoodController::class, "store"]);
                Route::get('/foods/{id}',[FoodController::class, "show"]);
                Route::post('/foods/{id}',[FoodController::class, "update"]);
                Route::delete('/foods/{id}',[FoodController::class, "destroy"]);
               
               
                Route::get('/categories',[CategoryController::class, "index"]);
                Route::post('/categories',[CategoryController::class, "store"]);
                Route::get('/categories/{id}',[CategoryController::class, "show"]);
                Route::post('/categories/{id}',[CategoryController::class, "update"]);
                Route::delete('/categories/{id}',[CategoryController::class, "destroy"]);
            });
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
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
