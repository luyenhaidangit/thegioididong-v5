<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_customers', function (Blueprint $table) {
            $table->engine = "InnoDB";
          $table->Increments('id')->unsigned();
          $table->string('name');
          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          $table->string('image')->nullable();
          $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('wards')->nullable();
            $table->integer('province')->nullable();
            $table->integer('city')->nullable();
          $table->rememberToken();
            $table->string('token')->nullable();
            $table->string('forgot')->nullable();
            $table->integer('status')->nullable()->default(0);
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
        Schema::dropIfExists('account_customers');
    }
}
