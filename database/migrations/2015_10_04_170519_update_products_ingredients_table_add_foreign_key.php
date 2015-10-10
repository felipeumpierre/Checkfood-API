<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProductsIngredientsTableAddForeignKey extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products_ingredients', function (Blueprint $table) {
            $table->foreign('products_id')->references('id')->on('products');
            $table->foreign('ingredients_id')->references('id')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_ingredients', function (Blueprint $table) {
            $table->dropForeign('products_ingredients_products_id_foreign');
            $table->dropColumn('products_id');

            $table->dropForeign('products_ingredients_ingredients_id_foreign');
            $table->dropColumn('ingredients_id');
        });
    }

}
