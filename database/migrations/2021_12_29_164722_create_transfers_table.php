<?php

use App\Models\Account;
use App\Models\TransferType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Transfer', function (Blueprint $table) {
            $table->id();
            $table->string("receiver_number");
            $table->date("transfer_date");
            $table->decimal("amount", 19, 4)->default(0);
            $table->string("title");
            $table->string("receiver_data")->nullable();
            $table->foreignIdFor(TransferType::class)->constrained("TransferType")->cascadeOnDelete();
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
        Schema::dropIfExists('Transfer');
    }
}
