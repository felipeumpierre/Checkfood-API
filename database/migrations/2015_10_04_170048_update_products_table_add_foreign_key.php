<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProductsTableAddForeignKey extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->foreign('file_upload_id')->references('id')->on('file_upload');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_categories_id_foreign');
            $table->dropColumn('categories_id');

            $table->dropForeign('products_file_upload_id_foreign');
            $table->dropColumn('file_upload_id');
        });
    }

}
