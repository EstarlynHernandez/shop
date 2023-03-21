<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Type;
use App\Models\Category;
use App\Models\table;
use App\Models\Subcategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(25),
            'description' => fake()->text(1200),
            'prize' => rand(1, 1000),
            'amount' => rand(1, 500),
            'images' => rand(1, 18).'/-img-/'.rand(1, 18),
            'type_id' => Type::find(rand(1, 25)),
            'category_id' => Category::find(rand(1, 15)),
            'table_id' => Table::find(rand(1, 300)),
            'subcategory_id' => Subcategory::find(rand(1, 15)),
        ];
    }
}
