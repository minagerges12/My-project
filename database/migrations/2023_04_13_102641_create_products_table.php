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
        Schema::create('products', function (Blueprint $table) {
            
            //id, Name, Description, Model, Price, Qty, Color, Image, Category_Id, Supplier_Id
            
            $table->id();
            $table->string("Name");
            $table->string("Description");
            $table->string("Model");
            $table->string("Image");
            $table->string("Color");
            $table->integer('Qty');
            $table->float('Price');
            $table->foreignId('Category_Id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('Supplier_Id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
