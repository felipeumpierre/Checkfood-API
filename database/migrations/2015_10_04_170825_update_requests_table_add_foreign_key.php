<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRequestsTableAddForeignKey extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests', function (Blueprint $table) {
			$table->foreign('boards_id')->references('id')->on('boards');
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropForeign('requests_boards_id_foreign');
            $table->dropColumn('boards_id');

            $table->dropForeign('requests_status_id_foreign');
            $table->dropColumn('status_id');
        });
    }

}
