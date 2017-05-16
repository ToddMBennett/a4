<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectRestaurantsAndBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {

            // 
            // $table->dropColumn('restaurant');

            $table->integer('restaurant_id')->unsigned();

            // connect 'restaurant_id'
            $table->foreign('restaurant_id')->references('id')->on('restaurants');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {

            $table->dropForeign('bills_restaurant_id_foreign');

            $table->dropColumn('restaurant_id');

        });
    }
}
