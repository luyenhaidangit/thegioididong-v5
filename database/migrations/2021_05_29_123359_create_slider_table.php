<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('slider_id')->unsigned();
            $table->string('image');
            $table->string('slider_small_title')->nullable();
            $table->string('slider_big_title')->nullable();
            $table->string('highlight_text')->nullable();
            $table->longText('slider_description')->nullable();
            $table->string('slider_link')->nullable();
            $table->string('slider_title_button')->nullable();
            $table->timestamps();
            $table->integer('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider');
    }
}
