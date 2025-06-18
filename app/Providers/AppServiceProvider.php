<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Countries;

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

        View::composer('*', function ($view) {
        if (Auth::check()) {
            $allCountries = Countries::all();
            $selectedId = Auth::user()->country_id;
            if(Auth::user())
            {
                $country = Countries::find(Auth::user()->country_id);
            }
            else
            {
                abort(404);
            }
            $view->with([
                'allCountries' => $allCountries,
                'selectedCountryId' => $selectedId,
                'selectedCountry'=> $country,
            ]);
        }
    });
    }

}
