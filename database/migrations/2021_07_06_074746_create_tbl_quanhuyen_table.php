<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblQuanhuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_quanhuyen', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('maqh')->unsigned();
            $table->string('name_quanhuyen');
            $table->string('type');
            $table->integer('matp')->unsigned();
            $table->foreign('matp')->references('matp')->on('tbl_tinhthanhpho');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_quanhuyen');
    }
}
