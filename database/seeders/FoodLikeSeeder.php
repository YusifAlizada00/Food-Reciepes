<?php

namespace Database\Seeders;

use App\Models\FoodWithLikes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Cusines;

class FoodLikeSeeder extends Seeder
{
    public function run(): void
    {
        $cusineIds = Cusines::pluck('id')->toArray();

        $response = Http::get('https://api.spoonacular.com/recipes/complexSearch', [
            'apiKey' => env('SPOONACULAR_API_KEY'),
            'sort' => 'popularity',
            'number' => 100,
        ]);

        if ($response->ok()) {
            $recipes = $response->json()['results'];

            foreach ($recipes as $recipe) {
                // Skip if already exists (by title or better: by recipe['id'] if you store it)
                if (FoodWithLikes::where('title', $recipe['title'])->exists()) {
                    continue;
                }
                // Fetch full details for each recipe
                $detailsResponse = Http::get("https://api.spoonacular.com/recipes/{$recipe['id']}/information", [
                    'number' => 100,
                    'apiKey' => env('SPOONACULAR_API_KEY'),
                ]);

                if ($detailsResponse->ok()) {
                    $details = $detailsResponse->json();

                    FoodWithLikes::create([
                        'title' => $details['title'],
                        'image' => $details['image'],
                        'instructions' => $details['instructions'] ?? 'No instructions provided.',
                        'ready_in_minutes' => $details['readyInMinutes'] ?? 0,
                        'servings' => $details['servings'] ?? 0,
                        'ingredients_count' => count($details['extendedIngredients'] ?? []),
                        'source_url' => $details['sourceUrl'] ?? '',
                        'cusine_id' => $cusineIds[array_rand($cusineIds)],
                        'aggregateLikes' => $details['aggregateLikes'] ?? 0,
                    ]);
                }
            }
        }
    }
}
