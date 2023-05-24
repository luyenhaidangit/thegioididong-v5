<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('order_id')->unsigned();
            $table->string('order_total');
            $table->string('order_payment');
            $table->integer('order_status')->default(0);
            $table->timestamps();
            $table->integer('coupon_id')->unsigned()->nullable();
            $table->foreign('coupon_id')->references('coupon_id')->on('coupon');
            $table->integer('shipping_id')->unsigned();
            $table->foreign('shipping_id')->references('shipping_id')->on('shipping');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
