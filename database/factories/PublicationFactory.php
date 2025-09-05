<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Seller;
use App\Models\Category;




/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publications>
 */
class PublicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'titulo' => $this->faker->sentence(3),
            'precio' => $this->faker->randomFloat(2, 10, 1000),
            'descripcion' => $this->faker->paragraph(),
            'visibilidad' => $this->faker->boolean(),
            'category_id' => Category::inRandomOrder()->first()?->id,
            'seller_id' => Seller::inRandomOrder()->first()?->id
        ];


}
   
}
