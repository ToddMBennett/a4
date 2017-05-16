<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('restaurant_tag', function (Blueprint $table) {

             $table->increments('id');
             $table->timestamps();

             // `bill_id` and `tag_id` will be foreign keys, so they have to be unsigned
             $table->integer('bill_id')->unsigned();
             $table->integer('tag_id')->unsigned();

             // Make foreign keys
             $table->foreign('bill_id')->references('id')->on('bills');
             $table->foreign('tag_id')->references('id')->on('tags');
         });
     }

     public function down()
     {
         Schema::drop('bill_tag');
     }

}
