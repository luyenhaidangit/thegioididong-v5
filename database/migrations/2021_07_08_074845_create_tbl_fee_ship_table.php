<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFeeShipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_fee_ship', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('fee_id')->unsigned();
            $table->integer('fee_matp')->unsigned();
            $table->foreign('fee_matp')->references('matp')->on('tbl_tinhthanhpho');
            $table->integer('fee_maqh')->unsigned();
            $table->foreign('fee_maqh')->references('maqh')->on('tbl_quanhuyen');
            $table->integer('fee_xaid')->unsigned();
            $table->foreign('fee_xaid')->references('xaid')->on('tbl_xaphuongthitran');
            $table->string('fee_feeship');
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
        Schema::dropIfExists('tbl_fee_ship');
    }
}
