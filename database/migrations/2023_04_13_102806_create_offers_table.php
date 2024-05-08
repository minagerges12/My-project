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
        Schema::create('offers', function (Blueprint $table) {
            //id, Total, Product_Id, Qty, Image, Description

            $table->id();
            $table->string("Image");
            $table->string("Description");
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
        Schema::dropIfExists('purchase_products');
    }
};
