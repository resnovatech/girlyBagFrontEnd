<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code');
            $table->string('category_slug');
            $table->string('subcategory_slug');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('brand_id')->nullable();
            $table->text('des');
            $table->text('buy_price');
            $table->integer('sell_price');
            $table->integer('unit');
            $table->integer('volume_id');
            $table->integer('reward_id');
            $table->integer('reward_point_product_count');
            $table->integer('discount_type');
            $table->integer('discount_amount');
            $table->integer('supplier_id');
            $table->string('stock_unit');
            $table->string('image');
            $table->integer('alert_quantity');
            $table->integer('purchase_limit');
            $table->integer('parent_description_id');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('products');
    }
}
