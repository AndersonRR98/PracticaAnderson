<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Publication;
use App\Models\User;
use App\Models\Seller;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Images>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $imageableModels = [
            Publication::class => Publication::inRandomOrder()->first() ?? Publication::factory()->create(),
            User::class => User::inRandomOrder()->first() ?? User::factory()->create(),
            Seller::class => Seller::inRandomOrder()->first() ?? Seller::factory()->create(),
        ];

        $imageableType = $this->faker->randomElement(array_keys($imageableModels));
        $imageable = $imageableModels[$imageableType];
        return [
            
          'url_image' => $this->faker->imageUrl(640, 480, 'products', true),
            // Relación polimórfica
            'imageable_id' => $imageable->id,
            'imageable_type' => $imageableType,

        ];
    }
}
