<?php

namespace Database\Seeders;

use App\Models\CustomerRequest;
use App\Models\Loan;
use App\Models\Transfer;
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

        CustomerRequest::factory()->count($count)->create();
        Loan::factory()->count($count)->create();
        Transfer::factory()->count($count)->create();
    }
}
