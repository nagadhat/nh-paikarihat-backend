<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        // return [
        //     'user_id' => 2,
        //     'brand_id' => 1,
        //     'category_id' => 1,
        //     'title' => $this->faker->sentence(),
        //     'sku' => Str::random(5),
        //     'price' => rand(11, 99),
        //     'quantity' => rand(11, 99)
        // ];
        $title = $this->faker->sentence();
        return [
            'user_id' => 2,
            'brand_id' => 1,
            'category_id' => 1,
            'title' => $title,
            'slug' => Str::slug($title),
            'sku' => Str::random(5),
            'price' => rand(11, 99),
            'quantity' => rand(11, 99),
        ];
    }
}
