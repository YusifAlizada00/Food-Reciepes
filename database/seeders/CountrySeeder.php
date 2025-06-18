<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Countries;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = json_decode(File::get(database_path('data/countries.json')), true);

        foreach ($countries as $country) {
            Countries::updateOrCreate(
                ['code' => $country['code']],
                ['name' => $country['name'], 'flag_url' => $country['flag_url'] ?? null]
            );
        }
    }
}
