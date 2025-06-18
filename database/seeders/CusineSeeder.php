<?php

namespace Database\Seeders;

use App\Models\Cusines;
use Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CusineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cusines = [
            'African' => 'Africa',
            'American' => 'USA',
            'British' => 'UK',
            'Chinese' => 'China',
            'French' => 'France',
            'German' => 'Germany',
            'Greek' => 'Greece',
            'Indian' => 'India',
            'Irish' => 'Ireland',
            'Italian' => 'Italy',
            'Japanese' => 'Japan',
            'Mexican' => 'Mexico',
            'Thai' => 'Thailand',
            'Vietnamese' => 'Vietnam',
            'Turkish' => 'Turkey',
        ];

        foreach ($cusines as $name => $country) {
            Cusines::create([
                'name' => $name,
                'country_name' => $country,
            ]);
        }

    }
}
