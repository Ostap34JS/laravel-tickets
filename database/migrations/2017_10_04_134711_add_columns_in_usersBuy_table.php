<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInUsersBuyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_buy', function (Blueprint $table) {
            $table->string('first_name',60)->after('ticket_id');
            $table->string('last_name',60)->after('first_name');;
            $table->integer('phone_number', false, true)->after('last_name');;
            $table->string('email','300')->after('phone_number');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_buy', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('phone_number');
            $table->dropColumn('email');
        });
    }
}
