<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRequestsObservationsTableAddForeignKey extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests_observations', function (Blueprint $table) {
            $table->foreign('requests_products_id')->references('id')->on('requests_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requests_observations', function (Blueprint $table) {
            $table->dropForeign('requests_observations_requests_products_id_foreign');
            $table->dropColumn('requests_products_id');
        });
    }

}
