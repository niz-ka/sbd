<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\CustomerRequest;
use App\Models\TransferType;
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
        $count = 10;

        TransferType::factory()->count($count)->create();
        CustomerRequest::factory()->count($count)->create();
        Account::factory()->count($count)->create();
    }
}
