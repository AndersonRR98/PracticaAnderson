<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChatsSupport>
 */
class ChatSupportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'mensaje' => $this->faker->sentence(),
            'fecha_mensaje' => now(),
            'atendido' => $this->faker->boolean(),
             'user_id' => User::inRandomOrder()->first()?->id,


        ];
    }
}
