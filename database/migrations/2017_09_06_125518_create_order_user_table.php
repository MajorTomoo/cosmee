<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_user', function (Blueprint $table) {
        $table->timestamps();
        $table->integer('user_id');
        $table->integer('order_id');
        $table->integer('product_id')->unsigned();
        $table->foreign('product_id')->references('id')->on('products');
        $table->primary(['order_id','user_id']);

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_user');
    }
}
