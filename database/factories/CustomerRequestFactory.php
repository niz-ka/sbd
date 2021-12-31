<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\RequestStatus;
use App\Models\RequestType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerRequestFactory extends Factory
{

    private $dummyComments = [
        "Załącznik do wniosku dostarczony w późniejszym terminie",
        "Wniosek złożony ze względu na zmianę miejsca zamieszkania",
        "Wniosek złożony ze względu na zmianę przepisów",
        "Wniosek wymaga uzupełnienia. Brakuje PESELu",
        "Wniosek przeznaczony do rozpatrzenia w Dziale Kredytowym",
        "", "", ""
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "request_date" => $this->faker->date(),
            "comment" => $this->dummyComments[rand(0, count($this->dummyComments)-1)],
            "customer_id" => Customer::factory(),
            "request_type_id" => rand(1,4),
            "request_status_id" => rand(1,4)
        ];
    }
}
