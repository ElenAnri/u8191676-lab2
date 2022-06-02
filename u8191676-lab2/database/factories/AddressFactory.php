<?php

namespace Database\Factories;

use App\Models\Buyer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'name' => $this->faker->word(),
        'city' => $this->faker->city(),
        'streetOrMicrodistrict' => $this->faker->streetName(),
        'building' => $this->faker->buildingNumber(),
        'floor' => $this->faker->numberBetween($min = 1, $max = 50),
        'flat' => $this->faker->numberBetween($min = 1, $max = 500),
        'intercomCode' => $this->faker->numerify('*####K'),
        'buyer_id' => Buyer::all()->random()->id,
        ];
    }
}
