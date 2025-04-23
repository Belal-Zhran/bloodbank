<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DonationRequest>
 */
class DonationRequestFactory extends Factory
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
            'age' => $this->faker->randomDigit(),
            'blood_type_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]),
            'bags_number' => $this->faker->randomDigit(),
            'hospital_name' => $this->faker->name(),
            'hospital_address' => $this->faker->address(),
            'city_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]),
            'phone' => $this->faker->phoneNumber(),
            'notes' => $this->faker->text(),
            'client_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]),
        ];
    }
}
