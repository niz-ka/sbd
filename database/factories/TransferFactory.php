<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\TransferType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransferFactory extends Factory
{
    private $dummyTitles = [
        "przelew",
        "przelew środków",
        "prezent urodzinowy",
        "wpłata do ZUSu",
        "mechanik - naprawa uszczelki pod głowicą",
        "czynsz za mieszkanie",
        "zbyt rzadko dbamy o dobry tytuł przelewu"
    ];

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
            "title" => $this->dummyTitles[rand(0, count($this->dummyTitles)-1)],
            "receiver_data" => $this->faker->optional(0.4)->address,
            "transfer_type_id" => rand(1, 4),
            "account_id" => Account::factory()
        ];
    }
}
