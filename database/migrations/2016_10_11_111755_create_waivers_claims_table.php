<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaiversClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waivers_claims', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('franchise_id')->unsigned()->nullable();
            $table->string('player_name', 30);
            $table->timestamp('added_on');

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
        Schema::dropIfExists('waivers_claims');
    }
}
