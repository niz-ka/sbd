<?php

namespace Database\Seeders;

use App\Models\AccountType;
use App\Models\RequestStatus;
use App\Models\RequestType;
use App\Models\TransferType;
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
        $count = 5;

        RequestType::factory()->count($count)->create();
        RequestStatus::factory()->count($count)->create();
        TransferType::factory()->count($count)->create();
        AccountType::factory()->count($count)->create();
    }
}
