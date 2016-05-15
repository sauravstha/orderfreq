<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderListProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
 */
    public function up()
    {
        Schema::create('orderlistproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('quantity');
            $table->integer('orderlist_id')->unsigned();
            $table->foreign('orderlist_id')->references('id')->on('orderlists');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orderlistproducts');
    }
}
