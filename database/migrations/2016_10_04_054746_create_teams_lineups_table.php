<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsLineupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams_lineups', function (Blueprint $table) {
            $table->increments('player_id')->unsigned();
            $table->string('w_01', 2)->nullable();
            $table->string('w_02', 2)->nullable();
            $table->string('w_03', 2)->nullable();
            $table->string('w_04', 2)->nullable();
            $table->string('w_05', 2)->nullable();
            $table->string('w_06', 2)->nullable();
            $table->string('w_07', 2)->nullable();
            $table->string('w_08', 2)->nullable();
            $table->string('w_09', 2)->nullable();
            $table->string('w_10', 2)->nullable();
            $table->string('w_11', 2)->nullable();
            $table->string('w_12', 2)->nullable();
            $table->string('w_13', 2)->nullable();
            $table->string('w_14', 2)->nullable();
            $table->string('w_15', 2)->nullable();
            $table->string('w_16', 2)->nullable();
            $table->string('w_17', 2)->nullable();
            $table->string('w_18', 2)->nullable();
            $table->string('w_19', 2)->nullable();
            $table->string('w_20', 2)->nullable();
            $table->string('w_21', 2)->nullable();
            $table->string('w_22', 2)->nullable();

            $table->foreign('player_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams_lineups');
    }
}
