<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlainUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alain_utilities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('site_name');
            $table->date('date_added'); 
            $table->decimal('well_water_p1');
            $table->decimal('well_water_p2');
            $table->decimal('well_water_p3');
            $table->decimal('well_water_p4');
            $table->decimal('ro_daily_water');
            $table->decimal('ro_reject_water');
            $table->decimal('mixing_unit_1');
            $table->decimal('mixing_unit_2');
            $table->decimal('transport_unit_1');
            $table->decimal('transport_unit_2');
            $table->decimal('pad_wall_1');
            $table->decimal('pad_wall_2');
            $table->decimal('tap_water_3');
            $table->decimal('tap_water_4');
            $table->decimal('condensation');
            $table->decimal('chiller');
            $table->decimal('mixing_unit_50');
            $table->decimal('mixing_unit_60');
            $table->decimal('electric_meter_1');
            $table->decimal('electric_meter_2');
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
        Schema::dropIfExists('alain_utilities');
    }
}
