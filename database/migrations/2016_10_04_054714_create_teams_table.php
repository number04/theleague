<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('franchise_id')->unsigned()->nullable();
            $table->string('player_name', 30)->unique();
            $table->string('draft', 2)->default('fa');
            $table->integer('contract')->default(0);
            $table->string('player_pos', 1)->default('T');;
            $table->date('player_dob')->nullable();
            $table->string('nhl', 3);
            $table->integer('games_played')->default(0);
            $table->integer('wins')->default(0);
            $table->integer('losses')->default(0);
            $table->integer('overtime_losses')->default(0);
            $table->integer('points')->default(0);
            $table->integer('goals_for')->default(0);
            $table->integer('goals_against')->default(0);
            $table->string('lineup_status', 2)->nullable();

            $table->foreign('franchise_id')->references('id')->on('franchises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
