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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("userId");
            $table->unsignedBigInteger("productId");
            $table->unsignedBigInteger("customerId");
            $table->unsignedBigInteger("brandId");
            $table->date("orderDate");
            $table->date("requireDate");
            $table->date("shippedDate")->nullable();
            $table->unsignedBigInteger("shipVia");
            $table->decimal("freight", 10, 2);
            $table->string("shipName");
            $table->string("shipAddress");
            $table->string("shipCity");
            $table->string("shipRegion")->nullable();
            $table->string("shipPostalCode");
            $table->string("shipCountry");
    
            

            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('productId')->references('id')->on('products');
            $table->foreign('shipVia')->references('id')->on('shippers');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
