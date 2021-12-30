<?php

namespace Database\Factories;

use App\Models\AccountType;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "number" => $this->faker->bankAccountNumber('161', 'PL', null),
            "name" => $this->faker->optional(0.7)->text(50),
            "balance" => $this->faker->randomFloat(null, 0, 100000),
            "interest_rate" => $this->faker->randomFloat(null, 0, 10),
            "opening_date" => $this->faker->date(),
            "account_type_id" => AccountType::factory(),
            "customer_id" => Customer::factory(),
            "co_owner_id" => Customer::factory()
        ];
    }
}
