<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('level')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->string('image')->nullable();
            $table->longText('title')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('background_image')->nullable();
            $table->longText('description')->nullable();
        });
//        DB::table('users')->insert([
//            'name' => 'admin',
//            'email' => 'admin@example.com',
//            'password' => Hash::Make('123456')
//        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
