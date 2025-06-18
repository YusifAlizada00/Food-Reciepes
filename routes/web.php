<?php

use App\Http\Controllers\AboutFood;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fetch-countries', [CountryController::class, 'fetchCountries']);

Route::get('/register', [CountryController::class, 'index'])
->name('register');

Route::get('/about-food', [AboutFood::class, 'index'])
->name('about-food');

Route::get('/frequently-asked-questions', [AboutFood::class, 'FAQ'])
->name('frequently-asked-questions');

Route::get('/international-food', [FoodController::class, 'internationalFood'])
->name('international-food')->middleware('auth');

Route::get('/top100-international', [FoodController::class, 'getTop100'])
->name('top-hundred');

Route::get('/salads', [FoodController::class, 'salads'])
->name('salads');

Route::get('/fruits', [FoodController::class, 'fruits'])
->name('fruits');

Route::post('/search', [FoodController::class, 'search'])
->name('search');
// Only logged-in users can access the dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [FoodController::class, 'index'])->name('dashboard');
});
