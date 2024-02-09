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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('companyName',20);
            $table->string('contactName',50);
            $table->string('contactTitle',30);
            $table->string('address',35);
            $table->string('city',30);
            $table->string('region',20);
            $table->string('postalCode',20);
            $table->string('country',20);
            $table->string('phone',20);
            $table->string('fax',20);
            $table->string('homePage',30);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
