<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start_date = $this->faker->date;

        return [
            "purpose" => $this->faker->optional(0.7)->text(100),
            "amount" => round($this->faker->randomFloat(null, 1000, 500000)),
            "start_date" => $start_date,
            "end_date" => Carbon::createFromFormat("Y-m-d", $start_date)->addMonths($this->faker->randomNumber(2, true)),
            "interest_rate" => $this->faker->randomFloat(null, 0, 20),
            "account_id" => Account::factory()
        ];
    }
}
