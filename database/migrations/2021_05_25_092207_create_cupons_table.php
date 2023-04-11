<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('code');
            $table->string('first_order_only');
            $table->string('active_from');
            $table->string('active_to');
            $table->string('discount_type');
            $table->string('discount_amount');
            $table->string('maximum_purchase_amount');
            $table->string('mimimum_purchase_discount');
            $table->string('usage_limit');
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
        Schema::dropIfExists('cupons');
    }
}
