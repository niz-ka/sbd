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
            $table->date("opening_date")->index();
            $table->foreignIdFor(AccountType::class)->constrained("AccountType")->cascadeOnDelete();
            $table->foreignIdFor(Customer::class)->constrained("Customer")->cascadeOnDelete();
            $table->foreignIdFor(Customer::class, "co_owner_id")->nullable()->constrained("Customer")->nullOnDelete();
        });

        $procedure = "
        DROP FUNCTION IF EXISTS account_report;
        CREATE FUNCTION account_report()
        RETURNS DECIMAL(19,2)
        BEGIN
           DECLARE varSum DECIMAL(19,4);
           SET varSum = 0;
           SET varSum = (SELECT COALESCE(SUM(balance), 0) FROM Account);
           RETURN ROUND(varSum, 2);
        END;";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Account');
        DB::unprepared("DROP FUNCTION IF EXISTS account_report");
    }
}
