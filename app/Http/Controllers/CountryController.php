<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class CountryController extends Controller
{

    public function index()
    {
        $countries = Countries::all();
        return view('auth.register', [
            'countries' => $countries,
        ]);
    }
    public function navBar()
    {

    }

    public function fetchCountries()
    {
        $countryAPI = Http::get('https://restcountries.com/v3.1/all');

        $countries = collect($countryAPI->json())
            ->map(function ($country) {
                return [
                    'name' => $country['name']['common'],  // fix: use 'common' name
                    'code' => $country['cca2'],
                    'flag_url' => $country['flags']['png'],
                ];
            })
            ->sortBy('name')  // use sortBy instead of sort
            ->values()
            ->all();

        // Make sure the directory exists
        $path = database_path('data');
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        // Save JSON file
        file_put_contents($path . '/countries.json', json_encode($countries, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function decode()
    {
        $countries = [];
        File::put(
            database_path('data/countries.json'),
            json_encode($countries, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

    }
}
