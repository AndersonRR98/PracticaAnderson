<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Role;




/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'primer_nombre' => $this->faker->Name(),
            'segundo_nombre' => $this->faker->optional()->firstName(),
            'primer_apellido' => $this->faker->lastName(),
            'segundo_apellido' => $this->faker->optional()->lastName(),
            'email' => $this->faker->unique()->Email(),
            'password' =>$this->faker->password(),
            'activo' => true,
             'rol_id' => Role::inRandomOrder()->first()?->id


        ];
    }
     

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
