<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OfficeProfiles>
 */
class OfficeProfilesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $city = fake()->city();

        return [
            'slug' => Str::slug($city),
            'title' => $city,
            'subtitle' => fake()->company(),
            'address' => fake()->address(),
            'address_maps_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d3960.9866970408875!2d107.539139!3d-6.892194!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwNTMnMzEuOSJTIDEwN8KwMzInMjAuOSJF!5e0!3m2!1sid!2sid!4v1721894675419!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'open_date' => fake()->dayOfWeek ().' - '.fake()->dayOfWeek ().': '.fake()->numberBetween(1, 8).fake()->amPm().' - '.fake()->numberBetween(1, 8).fake()->amPm(),
            'close_date' => fake()->dayOfWeek (),
            'email' => fake()->companyEmail(),
            'created_by' => 1,
            'updated_by' => 1,
            'deleted_by' => null
        ];
    }
}
