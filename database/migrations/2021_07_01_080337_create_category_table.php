<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('category_id')->unsigned();
            $table->string('category_icon')->nullable();;
            $table->string('category_name');
            $table->text('category_content')->nullable();
            $table->timestamps();
            $table->integer('category_position')->nullable();
            $table->integer('category_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}
