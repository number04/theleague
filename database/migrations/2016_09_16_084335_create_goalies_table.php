<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoaliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goalies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('franchise_id')->unsigned()->nullable();
            $table->string('player_name', 30)->unique();
            $table->string('player_first', 30)->nullable();
            $table->string('player_last', 30)->nullable();
            $table->string('draft', 2)->default('fa');
            $table->integer('contract')->default(0);
            $table->string('rookie', 2)->default('n');
            $table->string('player_pos', 1)->default('g');
            $table->date('player_dob')->nullable();
            $table->string('nhl', 3);
            $table->integer('games_played')->default(0);
            $table->integer('wins')->default(0);
            $table->integer('losses')->default(0);
            $table->integer('overtime_losses')->default(0);
            $table->decimal('goals_against_average', 4, 2)->default(0);
            $table->decimal('save_percentage', 4, 3)->default(0);
            $table->integer('saves')->default(0);
            $table->string('player_status', 4)->nullable();
            $table->string('injury_status', 3)->default('n');
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
        Schema::drop('goalies');
    }
}
