<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('photo')->nullable(); 
            $table->string('address');
            $table->string('city');
            $table->decimal('price');
            $table->date('date')->nullable();
            $table->timestamps();
        });

        /*Schema::table('appointments', function (Blueprint $table) {
            $table->foreignId('property_id')->nullable(true)->references('id')->on('properties');
        });

        Schema::table('offers', function (Blueprint $table) {
            $table->foreignId('property_id')->nullable(true)->references('id')->on('properties');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
