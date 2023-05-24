<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
          $table->engine = "InnoDB";
          $table->Increments('blog_id')->unsigned();
          $table->string('image');
          $table->string('blog_title')->nullable();
          $table->string('blog_author')->nullable();
          $table->dateTime('blog_time')->nullable();
          $table->longText('blog_description')->nullable();
            $table->integer('view')->nullable()->default(0);
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
        Schema::dropIfExists('blog');
    }
}
