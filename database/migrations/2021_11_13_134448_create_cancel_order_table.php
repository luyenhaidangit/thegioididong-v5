<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancelOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancel_order', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('cancel_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('account_customers');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('order_id')->on('order');
            $table->longText('content')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('cancel_order');
    }
}
