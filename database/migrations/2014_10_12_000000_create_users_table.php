<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('telephone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        /*Schema::table('properties', function (Blueprint $table) {
            $table->integer('user_id');
            $table->foreignId('user_id')->nullable(true)->references('id')->on('users');
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->integer('user_id');
            $table->foreignId('user_id')->nullable(true)->references('id')->on('users');
        });

        Schema::table('offers', function (Blueprint $table) {
            $table->integer('user_id');
            $table->foreignId('user_id')->nullable(true)->references('id')->on('users');
        });*/
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
