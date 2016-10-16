<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToFranchises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('franchises', function (Blueprint $table) {
            $table->string('best_finish', 36)->nullable();
            $table->integer('huddy_year')->default(0);
            $table->integer('huddy_all')->default(0);
            $table->integer('gretzky_year')->default(0);
            $table->integer('gretzky_all')->default(0);
            $table->integer('trade_year')->default(0);
            $table->integer('trade_all')->default(0);
            $table->integer('sign_year')->default(0);
            $table->integer('sign_all')->default(0);
            $table->integer('release_year')->default(0);
            $table->integer('release_all')->default(0);
            $table->integer('waiver_order')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('franchises', function (Blueprint $table) {
            $table->dropColumn('best_finish');
            $table->dropColumn('huddy_year');
            $table->dropColumn('huddy_all');
            $table->dropColumn('gretzky_year');
            $table->dropColumn('gretzky_all');
            $table->dropColumn('trade_year');
            $table->dropColumn('trade_all');
            $table->dropColumn('sign_year');
            $table->dropColumn('sign_all');
            $table->dropColumn('release_year');
            $table->dropColumn('release_all');
            $table->dropColumn('waiver_order');
        });
    }
}
