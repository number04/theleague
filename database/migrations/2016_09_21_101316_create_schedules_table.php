<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nhl', 3);
            $table->string('no_game', 4);
            $table->string('oct_13', 4);
            $table->string('oct_14', 4);
            $table->string('oct_15', 4);
            $table->string('oct_16', 4);
            $table->string('oct_17', 4);
            $table->string('oct_18', 4);
            $table->string('oct_19', 4);
            $table->string('oct_20', 4);
            $table->string('oct_21', 4);
            $table->string('oct_22', 4);
            $table->string('oct_23', 4);
            $table->string('oct_24', 4);
            $table->string('oct_25', 4);
            $table->string('oct_26', 4);
            $table->string('oct_27', 4);
            $table->string('oct_28', 4);
            $table->string('oct_29', 4);
            $table->string('oct_30', 4);
            $table->string('oct_31', 4);
            $table->string('nov_01', 4);
            $table->string('nov_02', 4);
            $table->string('nov_03', 4);
            $table->string('nov_04', 4);
            $table->string('nov_05', 4);
            $table->string('nov_06', 4);
            $table->string('nov_07', 4);
            $table->string('nov_08', 4);
            $table->string('nov_09', 4);
            $table->string('nov_10', 4);
            $table->string('nov_11', 4);
            $table->string('nov_12', 4);
            $table->string('nov_13', 4);
            $table->string('nov_14', 4);
            $table->string('nov_15', 4);
            $table->string('nov_16', 4);
            $table->string('nov_17', 4);
            $table->string('nov_18', 4);
            $table->string('nov_19', 4);
            $table->string('nov_20', 4);
            $table->string('nov_21', 4);
            $table->string('nov_22', 4);
            $table->string('nov_23', 4);
            $table->string('nov_24', 4);
            $table->string('nov_25', 4);
            $table->string('nov_26', 4);
            $table->string('nov_27', 4);
            $table->string('nov_28', 4);
            $table->string('nov_29', 4);
            $table->string('nov_30', 4);
            $table->string('dec_01', 4);
            $table->string('dec_02', 4);
            $table->string('dec_03', 4);
            $table->string('dec_04', 4);
            $table->string('dec_05', 4);
            $table->string('dec_06', 4);
            $table->string('dec_07', 4);
            $table->string('dec_08', 4);
            $table->string('dec_09', 4);
            $table->string('dec_10', 4);
            $table->string('dec_11', 4);
            $table->string('dec_12', 4);
            $table->string('dec_13', 4);
            $table->string('dec_14', 4);
            $table->string('dec_15', 4);
            $table->string('dec_16', 4);
            $table->string('dec_17', 4);
            $table->string('dec_18', 4);
            $table->string('dec_19', 4);
            $table->string('dec_20', 4);
            $table->string('dec_21', 4);
            $table->string('dec_22', 4);
            $table->string('dec_23', 4);
            $table->string('dec_24', 4);
            $table->string('dec_25', 4);
            $table->string('dec_26', 4);
            $table->string('dec_27', 4);
            $table->string('dec_28', 4);
            $table->string('dec_29', 4);
            $table->string('dec_30', 4);
            $table->string('dec_31', 4);
            $table->string('jan_01', 4);
            $table->string('jan_02', 4);
            $table->string('jan_03', 4);
            $table->string('jan_04', 4);
            $table->string('jan_05', 4);
            $table->string('jan_06', 4);
            $table->string('jan_07', 4);
            $table->string('jan_08', 4);
            $table->string('jan_09', 4);
            $table->string('jan_10', 4);
            $table->string('jan_11', 4);
            $table->string('jan_12', 4);
            $table->string('jan_13', 4);
            $table->string('jan_14', 4);
            $table->string('jan_15', 4);
            $table->string('jan_16', 4);
            $table->string('jan_17', 4);
            $table->string('jan_18', 4);
            $table->string('jan_19', 4);
            $table->string('jan_20', 4);
            $table->string('jan_21', 4);
            $table->string('jan_22', 4);
            $table->string('jan_23', 4);
            $table->string('jan_24', 4);
            $table->string('jan_25', 4);
            $table->string('jan_26', 4);
            $table->string('jan_27', 4);
            $table->string('jan_28', 4);
            $table->string('jan_29', 4);
            $table->string('jan_30', 4);
            $table->string('jan_31', 4);
            $table->string('feb_01', 4);
            $table->string('feb_02', 4);
            $table->string('feb_03', 4);
            $table->string('feb_04', 4);
            $table->string('feb_05', 4);
            $table->string('feb_06', 4);
            $table->string('feb_07', 4);
            $table->string('feb_08', 4);
            $table->string('feb_09', 4);
            $table->string('feb_10', 4);
            $table->string('feb_11', 4);
            $table->string('feb_12', 4);
            $table->string('feb_13', 4);
            $table->string('feb_14', 4);
            $table->string('feb_15', 4);
            $table->string('feb_16', 4);
            $table->string('feb_17', 4);
            $table->string('feb_18', 4);
            $table->string('feb_19', 4);
            $table->string('feb_20', 4);
            $table->string('feb_21', 4);
            $table->string('feb_22', 4);
            $table->string('feb_23', 4);
            $table->string('feb_24', 4);
            $table->string('feb_25', 4);
            $table->string('feb_26', 4);
            $table->string('feb_27', 4);
            $table->string('feb_28', 4);
            $table->string('mar_01', 4);
            $table->string('mar_02', 4);
            $table->string('mar_03', 4);
            $table->string('mar_04', 4);
            $table->string('mar_05', 4);
            $table->string('mar_06', 4);
            $table->string('mar_07', 4);
            $table->string('mar_08', 4);
            $table->string('mar_09', 4);
            $table->string('mar_10', 4);
            $table->string('mar_11', 4);
            $table->string('mar_12', 4);
            $table->string('mar_13', 4);
            $table->string('mar_14', 4);
            $table->string('mar_15', 4);
            $table->string('mar_16', 4);
            $table->string('mar_17', 4);
            $table->string('mar_18', 4);
            $table->string('mar_19', 4);
            $table->string('mar_20', 4);
            $table->string('mar_21', 4);
            $table->string('mar_22', 4);
            $table->string('mar_23', 4);
            $table->string('mar_24', 4);
            $table->string('mar_25', 4);
            $table->string('mar_26', 4);
            $table->string('mar_27', 4);
            $table->string('mar_28', 4);
            $table->string('mar_29', 4);
            $table->string('mar_30', 4);
            $table->string('mar_31', 4);
            $table->string('apr_01', 4);
            $table->string('apr_02', 4);
            $table->string('apr_03', 4);
            $table->string('apr_04', 4);
            $table->string('apr_05', 4);
            $table->string('apr_06', 4);
            $table->string('apr_07', 4);
            $table->string('apr_08', 4);
            $table->string('apr_09', 4);        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
