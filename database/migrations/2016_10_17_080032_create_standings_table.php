<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standings', function (Blueprint $table) {
            $table->integer('franchise_id')->unsigned()->nullable();
            $table->string('stat', 11)->nullable();
            $table->decimal('w_01', 3, 1)->default(0);
            $table->decimal('w_02', 3, 1)->default(0);
            $table->decimal('w_03', 3, 1)->default(0);
            $table->decimal('w_04', 3, 1)->default(0);
            $table->decimal('w_05', 3, 1)->default(0);
            $table->decimal('w_06', 3, 1)->default(0);
            $table->decimal('w_07', 3, 1)->default(0);
            $table->decimal('w_08', 3, 1)->default(0);
            $table->decimal('w_09', 3, 1)->default(0);
            $table->decimal('w_10', 3, 1)->default(0);
            $table->decimal('w_11', 3, 1)->default(0);
            $table->decimal('w_12', 3, 1)->default(0);
            $table->decimal('w_13', 3, 1)->default(0);
            $table->decimal('w_14', 3, 1)->default(0);
            $table->decimal('w_15', 3, 1)->default(0);
            $table->decimal('w_16', 3, 1)->default(0);
            $table->decimal('w_17', 3, 1)->default(0);
            $table->decimal('w_18', 3, 1)->default(0);
            $table->decimal('w_19', 3, 1)->default(0);
            $table->decimal('w_20', 3, 1)->default(0);
            $table->decimal('w_21', 3, 1)->default(0);
            $table->decimal('w_22', 3, 1)->default(0);

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
        Schema::drop('standings', function (Blueprint $table) {
            //
        });
    }
}
