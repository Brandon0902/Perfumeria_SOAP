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
        Schema::create('brand_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brandId');
            $table->unsignedBigInteger('categoryId');
            $table->timestamps();
        
            $table->foreign('brandId')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('categoryId')->references('id')->on('categories')->onDelete('cascade');
        
            $table->unique(['brandId', 'categoryId']); // Para asegurar la unicidad de las relaciones.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_categories');
    }
};
