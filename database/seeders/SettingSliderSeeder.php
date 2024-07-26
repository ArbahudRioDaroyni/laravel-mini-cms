<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SettingSlider;

class SettingSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SettingSlider::factory()->count(8)->create();
    }
}
