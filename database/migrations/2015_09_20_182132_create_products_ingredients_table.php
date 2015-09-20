<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products_ingredients', function(Blueprint $table)
        {
            $table->increments('id');
            $table->foreign('products_id')->references('id')->on('products');
            $table->foreign('ingredients_id')->references('id')->on('ingredients');
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
        Schema::table('products_ingredients', function(Blueprint $table)
        {
            # products_id
            $table->dropForeign('products_ingredients_products_id_foreign');
            $table->dropColumn('products_id');

            # ingredients_id
            $table->dropForeign('products_ingredients_ingredients_id_foreign');
            $table->dropColumn('ingredients_id');
        });

        Schema::drop('products_ingredients');
    }
}
