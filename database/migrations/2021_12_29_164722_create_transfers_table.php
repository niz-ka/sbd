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
            $table->string("receiver_number")->index();
            $table->date("transfer_date")->index();
            $table->decimal("amount", 19, 4)->default(0);
            $table->string("title");
            $table->string("receiver_data")->nullable();
            $table->foreignIdFor(TransferType::class)->constrained("TransferType")->cascadeOnDelete();
            $table->foreignIdFor(Account::class)->constrained("Account")->cascadeOnDelete();
        });

        $procedure = "
        DROP PROCEDURE IF EXISTS transfer_report;
        CREATE PROCEDURE transfer_report(IN varDate DATE)
        BEGIN
           SELECT name,
           (SELECT ROUND(COALESCE(SUM(amount), 0), 2) FROM Transfer WHERE transfer_type_id = tt.id AND transfer_date = varDate) as total,
           (SELECT COUNT(*) FROM Transfer WHERE transfer_type_id = tt.id AND transfer_date = varDate) as number
           FROM TransferType tt;
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
        Schema::dropIfExists('Transfer');
        DB::unprepared("DROP PROCEDURE IF EXISTS transfer_report;");
    }
}
