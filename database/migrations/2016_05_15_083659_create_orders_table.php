<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('order_date');
            $table->timestamp('delivery_date');
            $table->timestamp('delivered_date')->nullable();
            $table->integer('deliveryaddress_id')->unsigned();
            $table->integer('orderlist_id')->unsigned();
            $table->foreign('deliveryaddress_id')->references('id')->on('deliveryaddresses');
            $table->foreign('orderlist_id')->references('id')->on('orderlists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
