<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblXaphuongthitranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_xaphuongthitran', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('xaid')->unsigned();
            $table->string('name_xaphuong');
            $table->string('type');
            $table->integer('maqh')->unsigned();
            $table->foreign('maqh')->references('maqh')->on('tbl_quanhuyen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_xaphuongthitran');
    }
}
