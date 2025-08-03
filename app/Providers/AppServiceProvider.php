<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View; // ✅ Убедитесь, что это подключено
use App\Http\View\Composers\CountryNavigationComposer;
use Illuminate\Support\Facades\URL;

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
        Paginator::useBootstrapFive();
        View::composer(
            'partials._country_nav',
            CountryNavigationComposer::class
        );
        URL::defaults(['locale' => $this->app->getLocale()]);
    }
}
