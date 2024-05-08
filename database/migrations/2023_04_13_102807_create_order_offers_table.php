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
        Schema::create('order_offers', function (Blueprint $table) {
            //id, Order_id, Offer_id, Qty, Total
            
            $table->id();
            $table->foreignId('Order_Id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('Offer_Id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('purchases');
    }
};
