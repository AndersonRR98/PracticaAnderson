<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Publication;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complaints>
 */
class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'estado' => $this->faker->boolean(50),
            'descripcion_adicional' => $this->faker->sentence(),
            'reason_id' => $this->faker->numberbetween(1,5),
            'user_id' => User::inRandomOrder()->first()?->id,
            'publication_id' => Publication::inRandomOrder()->first()?->id



        ];
    }
}
