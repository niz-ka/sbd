<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\RequestStatus;
use App\Models\RequestType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "request_date" => $this->faker->date(),
            "comment" => $this->faker->optional(0.7)->text(250),
            "customer_id" => Customer::factory(),
            "request_type_id" => RequestType::factory(),
            "request_status_id" => RequestStatus::factory()
        ];
    }
}
