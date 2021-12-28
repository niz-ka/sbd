<?php

use App\Models\AccountType;
use App\Models\Customer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Account', function (Blueprint $table) {
            $table->id();
            $table->string("number")->unique();
            $table->string("name")->nullable();
            $table->decimal("balance", 19, 4, true)->default(0);
            $table->float("interest_rate")->default(0);
            $table->date("opening_date");
            $table->foreignIdFor(AccountType::class)->constrained("AccountType")->cascadeOnDelete();
            $table->foreignIdFor(Customer::class)->constrained("Customer")->cascadeOnDelete();
            $table->foreignIdFor(Customer::class, "co_owner_id")->nullable()->constrained("Customer")->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Account');
    }
}
