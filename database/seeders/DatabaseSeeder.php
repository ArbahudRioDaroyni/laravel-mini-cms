<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SettingSlider;
use App\Models\OfficeProfiles;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\TopMenu;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		// User::factory(10)->create();
		User::factory()->create([
			'name' => 'Admin',
			'email' => 'admin@example.com',
			'password' => 123
		]);

		$this->call([
				SettingSliderSeeder::class,
				OfficeProfilesSeeder::class,
				ArticleCategorySeeder::class,
				ArticleSeeder::class
		]);
	}
}
