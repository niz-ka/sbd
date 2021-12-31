<?php

use App\Models\Account;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Loan', function (Blueprint $table) {
            $table->id();
            $table->text("purpose")->nullable();
            $table->decimal("amount", 19, 4)->default(0)->index();
            $table->date("end_date")->index();
            $table->date("start_date");
            $table->float("interest_rate")->default(0);
            $table->foreignIdFor(Account::class)->constrained("Account")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Loan');
    }
}
