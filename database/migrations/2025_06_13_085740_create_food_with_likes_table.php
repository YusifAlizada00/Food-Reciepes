<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('food_with_likes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('image')->unique();
            $table->string('instructions');
            $table->integer('ready_in_minutes');
            $table->integer('servings');
            $table->integer('ingredients_count');
            $table->string('source_url');
            $table->foreignId('cusine_id')->constrained('cusines')->onDelete('cascade');
            $table->integer('aggregateLikes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_with_likes');
    }
};
