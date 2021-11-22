<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeeklyHarvestForecastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_harvest_forecasts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); 
            $table->integer('week_num');
            $table->integer('year');
            $table->string('product_type');
            $table->float('kgs_harvested');
            $table->float('first_quality');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weekly_harvest_forecasts');
    }
}
