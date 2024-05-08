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
        Schema::create('order_products', function (Blueprint $table) {
            //id, Order_Id, Product_Id, Qty, Total
            $table->id();
            $table->foreignId('Order_Id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('Product_Id')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('Qty');
            $table->float('Total');
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
        Schema::dropIfExists('order_products');
    }
};
