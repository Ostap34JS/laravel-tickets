<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from_city_id');
            $table->string('to_city_id');
            $table->integer('bus_id');
            $table->integer('limit_passenger');
            $table->integer('number_passenger');
            $table->float('price');	
            $table->date('date');
            $table->timestamps();
        });

        Schema::create('users_buy', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_id');
            $table->boolean('status');    
            $table->timestamps();
        });

        Schema::create('bus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mark');
            $table->string('bus_number');
            $table->string('cerrier');
            $table->timestamps();
        });

        Schema::create('city', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
        });

        Schema::create('station', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adress');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets_list');
        Schema::drop('users_buy');
        Schema::drop('bus');
        Schema::drop('city');
        Schema::drop('station');
    }
}
