<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'nom' =>$this->faker->randomElement(['Orange', 'Dattes', 'Noix sèche', 'Ananas avion']),
            'description' => $this->faker->text(100),
            'prix' => $this->faker->randomFloat(2, 0, 1000),
            'slug' => $this->faker->slug(1),
            'coup_de_coeur' => $this->faker->boolean(), 
            'image' => $this->faker->imageUrl(),
            'promotion' =>$this->faker->randomFloat(2, 0, 10,5),
            'category_id' => Category::factory(),
        ];
    }
}
