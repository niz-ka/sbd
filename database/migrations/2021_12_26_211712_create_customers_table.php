<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Address;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Customer', function (Blueprint $table) {
            $table->id();
            $table->string("full_name")->index();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->foreignIdFor(Address::class)->constrained("Address")->cascadeOnDelete();
            $table->string("NIP")->unique()->nullable();
            $table->string("REGON")->unique()->nullable();
            $table->string("company_name")->nullable();
            $table->string("PESEL")->unique()->nullable();
            $table->string("customer_kind");
        });

        DB::statement("ALTER TABLE Customer ADD CONSTRAINT chk_customer_kind CHECK (customer_kind IN ('indywidualny','biznesowy') );");
        $procedure = "
        DROP TRIGGER IF EXISTS delete_address;
        CREATE TRIGGER delete_address AFTER DELETE ON Customer
        FOR EACH ROW
        BEGIN
           DELETE FROM Address WHERE id = OLD.address_id;
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
        Schema::dropIfExists('Customer');
    }
}
