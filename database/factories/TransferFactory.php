<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\TransferType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "receiver_number" => $this->faker->bankAccountNumber('', 'PL', null),
            "transfer_date" => $this->faker->date,
            "amount" => $this->faker->randomFloat(null, 0, 10000),
            "title" => $this->faker->text(50),
            "receiver_data" => $this->faker->optional(0.4)->address,
            "transfer_type_id" => TransferType::factory(),
            "account_id" => Account::factory()
        ];
    }
}
