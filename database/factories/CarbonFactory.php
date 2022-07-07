<?php

namespace Database\Factories;


use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carbon>
 */
class CarbonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'sale' => $this->faker->numberBetween(5000, 15000),
            'created_at' => Carbon::now()

        ];
    }
}
