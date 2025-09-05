<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Publication;




/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PublicationUser>
 */
class PublicationUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'publication_id' => Publication::inRandomOrder()->first()?->id,
            'user_id' => User::inRandomOrder()->first()?->id,

        

        ];
    }
}
