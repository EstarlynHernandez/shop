<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Table>
 */
class TableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(),
            'field_1' => fake()->text(8),
            'field_2' => fake()->text(8),
            'field_3' => fake()->text(8),
            'field_4' => fake()->text(8),
            'field_5' => fake()->text(8),
            'field_6' => fake()->text(8),
            'field_7' => fake()->text(8),
            'field_8' => fake()->text(8),
            'field_9' => fake()->text(8),
            'field_10' => fake()->text(8),
            'field_11' => fake()->text(8),
            'field_12' => fake()->text(8),
            'field_13' => fake()->text(8),
            'field_14' => fake()->text(8),
            'field_15' => fake()->text(8),
        ];
    }
}
