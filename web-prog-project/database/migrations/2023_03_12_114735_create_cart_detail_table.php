<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_detail', function (Blueprint $table) {
            $table->id('cartDetailId');
            $table->unsignedBigInteger('cartId');
            $table->foreign('cartId')->references('cartId')->on('cart')->onDelete('cascade');
            $table->unsignedBigInteger('productId');
            $table->foreign('productId')->references('productId')->on('product')->onDelete('cascade');
            $table->integer('quantity');
            $table->double('total');
            $table->boolean('isComplete');
            $table->timestamps();
            
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_detail');
    }
};