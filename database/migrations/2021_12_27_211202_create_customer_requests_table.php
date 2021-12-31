<?php

use App\Models\Customer;
use App\Models\RequestStatus;
use App\Models\RequestType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CustomerRequest', function (Blueprint $table) {
            $table->id();
            $table->date("request_date")->index();
            $table->text("comment")->nullable();
            $table->foreignIdFor(Customer::class)->constrained("Customer")->cascadeOnDelete();
            $table->foreignIdFor(RequestType::class)->constrained("RequestType")->cascadeOnDelete();
            $table->foreignIdFor(RequestStatus::class)->constrained("RequestStatus")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CustomerRequest');
    }
}
