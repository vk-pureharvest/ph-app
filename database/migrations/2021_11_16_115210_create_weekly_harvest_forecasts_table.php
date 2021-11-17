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
            $table->string('site_name')->default('Al Ain');
            $table->integer('week_num');
            $table->string('product_name');
            $table->float('kgs_harvested');
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
