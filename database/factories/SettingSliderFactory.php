<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SettingSlider>
 */
class SettingSliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $headlineText1 = ucwords(fake()->words(2, true));
        $headlineText2 = ucwords(fake()->words(fake()->numberBetween(1, 3), true));
        $headlineText3 = ucwords(fake()->words(fake()->numberBetween(1, 3), true));

        $headline = "<h1>{$headlineText1} <span>{$headlineText2}</span> {$headlineText3}</h1>";

        return [
            'headline' => $headline,
            'slug' => Str::slug(strip_tags($headlineText1 . ' ' . $headlineText2 . ' ' . $headlineText3)),
            'body' => fake()->paragraph(),
            'image' => fake()->imageUrl(),
            'text-left-cta' => fake()->words(2, true),
            'url-left-cta' => fake()->url(),
            'text-right-cta' => fake()->words(2, true),
            'url-right-cta' => fake()->url(),
            'position' => fake()->numberBetween(1, 8),
            'created_by' => 1,
            'updated_by' => 1,
            'deleted_by' => null
        ];
    }
}
