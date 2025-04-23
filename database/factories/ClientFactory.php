<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'birth_date' => $this->faker->date(),
            'blood_type_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]),
            'last_donation' => $this->faker->date(),
            'city_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]),
            'phone_number' => $this->faker->phoneNumber(),
            'password' => $this->faker->password('password'),
        ];
    }
}
