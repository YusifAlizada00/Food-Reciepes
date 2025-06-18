<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'title',
        'image',
        'instructions',
        'ready_in_minutes',
        'servings',
        'ingredients_count',
        'source_url',
        'cusine_id',
    ];
}
