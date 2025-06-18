<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Http;
use App\Models\Food;
use App\Models\Cusines;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cusineIds = Cusines::pluck('id')->toArray();
        $response = Http::get('https://api.spoonacular.com/recipes/random', [
            'number' => 1000,
            'apiKey' => env('SPOONACULAR_API_KEY'), // Always pass your API key!
        ]);

        if ($response->ok()) {
            $recipes = $response->json()['recipes']; // The array of recipe data
            //dd($recipes[0]);
            foreach ($recipes as $recipe) {
                Food::create([
                    'title' => $recipe['title'],
                    'image' => $recipe['image'],
                    'instructions' => !empty($recipe['instructions']) ? $recipe['instructions'] : 'No instructions provided.',
                    'ready_in_minutes' => $recipe['readyInMinutes'],
                    'servings' => $recipe['servings'],
                    'ingredients_count' => count($recipe['extendedIngredients'] ?? []),
                    'source_url' => $recipe['sourceUrl'],
                    'cusine_id' => $cusineIds[array_rand($cusineIds)], // Assign a random cuisine id
                    // Add more fields as needed, matching your DB columns
                ]);
            }
        }

    }

    
}
