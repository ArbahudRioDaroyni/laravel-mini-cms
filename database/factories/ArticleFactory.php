<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ArticleCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArticleProfiles>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = ucwords(fake()->words(3, true));

        return [
            'title' => $title,
            'subtitle' => ucwords(fake()->words(2, true)),
            'slug' => Str::slug($title),
            'body' => fake()->paragraph(),
            'url' => fake()->url(),
            'image' => fake()->imageUrl(),
            'category_id' => ArticleCategory::inRandomOrder()->first()->id,
            'created_by' => 1,
            'updated_by' => 1,
            'deleted_by' => null
        ];
    }
}
