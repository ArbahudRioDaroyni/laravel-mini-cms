<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OfficeProfiles;

class OfficeProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OfficeProfiles::factory()->count(20)->create();
    }
}
