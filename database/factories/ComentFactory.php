<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Publication;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coments>
 */
class ComentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
         protected $model=Coment::class;

    public function definition(): array
    {
        return [
            'texto' => $this->faker->sentence(),
            'valor_estrella' => $this->faker->numberBetween(1, 5),
             'publication_id' => Publication::inRandomOrder()->first()?->id,
            'user_id' => User::inRandomOrder()->first()?->id,


        ];
    }
}
