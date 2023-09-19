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
        Schema::create('attribute_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('color_id')->nullable()->constrained('colors');
            $table->foreignId('size_id')->nullable()->constrained('sizes');
            $table->foreignId('product_id')->constrained('products');
            $table->integer('quantity')->default(0);
            $table->float('price', unsigned: true)->startingValue(1);
            $table->tinyInteger('discount', unsigned: true)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_product');
    }
};
