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
        Schema::table('attribute_product', function (Blueprint $table) {
            $table->bigInteger('image_id', unsigned: true)->nullable()->after('product_id');
            $table->foreign('image_id', 'FK_Attribute_Product_Image')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attribute_product', function (Blueprint $table) {
            $table->dropForeign('FK_Attribute_Product_Image');
            $table->dropColumn('image_id');
        });
    }
};
