<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dealer>
 */
class DealerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'province_id' => Province::inRandomOrder()->first()->id,
            'brand_id' => Brand::inRandomOrder()->first()->id,
        ];
    }
}
