<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'admin_id' => Admin::factory(),
            'category_id' => Category::factory(),
            'price' => $this->faker->randomFloat(10, 0, 500),
            'published_at' => Carbon::now(),
        ];
    }
}
