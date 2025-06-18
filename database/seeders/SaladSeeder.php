<?php

namespace Database\Seeders;

use App\View\Components\Salads;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FoodWithLikes;
use App\Models\Cusines;
use App\Models\Salad;
use Illuminate\Support\Facades\Http;

class SaladSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cusineIds = Cusines::pluck('id')->toArray();

        // Step 1: Search for salad recipes
        $response = Http::get('https://api.spoonacular.com/recipes/complexSearch', [
            'query' => 'salad',
            'number' => 200,
            'apiKey' => env('SPOONACULAR_API_KEY'),
        ]);

        if ($response->ok()) {
            $recipes = $response->json()['results'];

            foreach ($recipes as $recipe) {
                // Prevent duplicate by title (better to use id if saved)
                if (Salad::where('title', $recipe['title'])->exists()) {
                    continue;
                }

                // Step 2: Get full details of each recipe
                $details = Http::get("https://api.spoonacular.com/recipes/{$recipe['id']}/information", [
                    'apiKey' => env('SPOONACULAR_API_KEY'),
                ]);
                if ($details->ok()) {
                    $data = $details->json();

                        Salad::create([
                        'title' => $data['title'],
                        'image' => $data['image'],
                        'instructions' => $data['instructions'] ?? 'No instructions.',
                        'ready_in_minutes' => $data['readyInMinutes'] ?? 0,
                        'servings' => $data['servings'] ?? 0,
                        'ingredients_count' => count($data['extendedIngredients'] ?? []),
                        'source_url' => $data['sourceUrl'] ?? '',
                        'cusine_id' => $cusineIds[array_rand($cusineIds)],
                        'aggregateLikes' => $data['aggregateLikes'] ?? 0,
                    ]);
                }
            }
        }
    }
}
