<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Faker\Generator as Faker;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'name' => $faker->word,
            'price' => $faker->randomFloat(2, 0, 1000),
            'category_id' => rand(1,20)
        ];
    }
}

