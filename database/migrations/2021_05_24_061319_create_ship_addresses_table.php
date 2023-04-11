<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('Fname');
            $table->string('lname');
            $table->string('country');
            $table->string('dis');
            $table->string('address');
            $table->string('cstatus');
            $table->string('payment_type');
            $table->string('order_comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ship_addresses');
    }
}
