<?php

namespace Database\Seeders;

use App\Models\RequestType;
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
        RequestType::factory()->count(5)->create();
    }
}
