<?php

namespace Database\Factories;

use App\Models\AccountType;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    private $dummyNames = [
        "Moje konto podstawowe",
        "Konto dziecka",
        "Na wypłaty z korpo",
        "Konto Kasi",
        "Na ostatnie oszczędności",
        "Główny",
        "Ogólny",
        "", "", "", "", ""
    ];


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "number" => $this->faker->bankAccountNumber('161', 'PL', null),
            "name" => $this->dummyNames[rand(0, count($this->dummyNames)-1)],
            "balance" => $this->faker->randomFloat(null, 0, 100000),
            "interest_rate" => $this->faker->randomFloat(null, 0, 5),
            "opening_date" => $this->faker->date(),
            "account_type_id" => rand(1, 3),
            "customer_id" => Customer::factory(),
            "co_owner_id" => Customer::factory()
        ];
    }
}
