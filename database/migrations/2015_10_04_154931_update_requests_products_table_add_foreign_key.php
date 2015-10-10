<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRequestsProductsTableAddForeignKey extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests_products', function (Blueprint $table) {
            $table->foreign('requests_id')->references('id')->on('requests');
            $table->foreign('products_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requests_products', function (Blueprint $table) {
            $table->dropForeign('requests_products_requests_id_foreign');
            $table->dropColumn('requests_id');

            $table->dropForeign('requests_products_products_id_foreign');
            $table->dropColumn('products_id');
        });
    }

}
