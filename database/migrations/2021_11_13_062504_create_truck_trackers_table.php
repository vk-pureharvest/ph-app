<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruckTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_trackers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('site_name');
            $table->date('date_added'); 
            $table->string('vehicle_reg');
            $table->integer('truck_num');
            $table->string('truck_size');
            $table->decimal('no_of_pallets');
            $table->string('customer');
            $table->string('location');
            $table->time('time_entered'); 
            $table->time('time_left');
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
        Schema::dropIfExists('truck_trackers');
    }
}
