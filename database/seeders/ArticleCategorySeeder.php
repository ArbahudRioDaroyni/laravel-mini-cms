<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArticleCategory;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ArticleCategory::factory()->count(2)->create();

        // ArticleCategory::factory()->berita()->create();
        // ArticleCategory::factory()->pengumuman()->create();
        // ArticleCategory::factory()->semua()->create();

        $categories = ['Berita', 'Pengumuman', 'Semua'];
        ArticleCategory::factory()->createCategories($categories);
    }
}
