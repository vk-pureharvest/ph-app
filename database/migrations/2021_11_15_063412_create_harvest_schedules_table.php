<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHarvestSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harvest_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name');
            $table->string('crop_type');
            $table->float('num_of_harvests');
            $table->float('total_rows');
            $table->float('buffer');
            $table->float('sat_harvest');
            $table->float('sun_harvest');
            $table->float('mon_harvest');
            $table->float('tue_harvest');
            $table->float('wed_harvest');
            $table->float('thu_harvest');
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
        Schema::dropIfExists('harvest_schedules');
    }
}
