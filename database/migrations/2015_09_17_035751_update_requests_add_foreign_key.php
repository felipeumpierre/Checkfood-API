<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRequestsAddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests', function(Blueprint $table)
        {
            $table->foreign('products_id')->references('id')->on('products');
            $table->foreign('boards_id')->references('id')->on('boards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function(Blueprint $table)
        {
            # products_id
            $table->dropForeign('requests_products_id_foreign');
            $table->dropColumn('products_id');

            # boards_id
            $table->dropForeign('requests_boards_id_foreign');
            $table->dropColumn('boards_id');
        });
    }
}
