<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $addr = explode("/", $this->faker->buildingNumber());

        return [
            "street" => $this->faker->streetName(),
            "number" => $addr[0],
            "apartment" => $addr[1] ?? null,
            "city" => $this->faker->city(),
            "postal_code" => $this->faker->postcode()
        ];
    }
}
