<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if (rand(0, 1) === 0) {
            return [
                "full_name" => $this->faker->firstName . " " . $this->faker->lastName,
                "phone" => $this->faker->optional(0.8)->phoneNumber,
                "email" => $this->faker->optional(0.8)->email,
                "address_id" => Address::factory(),
                "NIP" => $this->faker->taxpayerIdentificationNumber,
                "REGON" => $this->faker->regon,
                "company_name" => $this->faker->lastName . " " . $this->faker->companySuffix,
                "customer_kind" => "biznesowy"
            ];
        } else {
            return [
                "full_name" => $this->faker->firstName . " " . $this->faker->lastName,
                "phone" => $this->faker->phoneNumber,
                "email" => $this->faker->email,
                "address_id" => Address::factory(),
                "PESEL" => $this->faker->pesel,
                "customer_kind" => "indywidualny"
            ];
        }
    }
}
