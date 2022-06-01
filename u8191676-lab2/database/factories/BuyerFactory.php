<?php

namespace Database\Factories;

use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buyer>
 */
class BuyerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'firstName' => $this->faker->firstName(),
        'lastName' => $this->faker->lastName(),
        'email' => $this->faker->email(),
        'phone' => $this->faker->phoneNumber(),
        'isBlocked' => $this->faker->boolean(),
        ];
    }
}
