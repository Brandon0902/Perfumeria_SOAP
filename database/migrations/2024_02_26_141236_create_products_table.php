<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('supplierId');
            $table->unsignedBigInteger('categoryId');
            $table->integer('quantityPerUnit');
            $table->double('price',8,2);
            $table->string ('description');
            $table->integer('unitsInStock');
            $table->integer('unitsOnOrder');
            $table->integer('reoderLevel');
            $table->string('discontinued');
            $table->string('image')->nulleable();

            //llaves foraneas
            $table->foreign('supplierId')->references('id')->on('suppliers');
            $table->foreign('categoryId')->references('id')->on('categories');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
