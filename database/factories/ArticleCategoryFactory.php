<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ArticleCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArticleCategory>
 */
class ArticleCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticleCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(),
            'slug' => Str::slug(fake()->unique()->word()),
        ];
    }

    /**
     * Create multiple specific categories.
     */
    public function createCategories(array $categories)
    {
        foreach ($categories as $category) {
            ArticleCategory::factory()->create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }

    /**
     * State
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function berita(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Berita',
                'slug' => Str::slug('berita'),
            ];
        });
    }

    /**
     * State
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function pengumuman(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Pengumuman',
                'slug' => Str::slug('pengumuman'),
            ];
        });
    }

    /**
     * State
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function semua(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Semua',
                'slug' => Str::slug('semua'),
            ];
        });
    }
}
