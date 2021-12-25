<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransferTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->word(),
            "description" => $this->faker->optional(0.7)->text(250)
        ];
    }
}
