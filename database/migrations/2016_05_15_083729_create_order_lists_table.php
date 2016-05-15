<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderlists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('frequency')->nullable();
            $table->timestamp('start_delivery_date');
            $table->timestamp('scheduled_delivery_date')->nullable();
            $table->timestamp('actual_delivery_date');
            $table->integer('home_id')->unsigned();
            $table->foreign('home_id')->references('id')->on('homes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orderlists');
    }
}
