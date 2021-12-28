<?php

namespace Database\Seeders;

use App\Models\AccountType;
use App\Models\Address;
use App\Models\Customer;
use App\Models\CustomerRequest;
use App\Models\RequestStatus;
use App\Models\RequestType;
use App\Models\TransferType;
use Database\Factories\AddressFactory;
use Database\Factories\RequestTypeFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $count = 20;

        TransferType::factory()->count($count)->create();
        AccountType::factory()->count($count)->create();

        CustomerRequest::factory()->count($count)->create();
    }
}
