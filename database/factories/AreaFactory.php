<?php

namespace Database\Factories;

use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Area>
 */
class AreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'area_codigo' => 'ARE' . str_pad($this->faker->unique()->numberBetween(1,9999), 4, '0',STR_PAD_LEFT),
            'area_nombre' => $this->faker->unique()->company(),
            'area_estado' => $this->faker->randomElement(['A','E'])
        ];
    }
}
