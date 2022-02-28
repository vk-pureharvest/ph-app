<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNahelUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nahel_utilities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('site_name');
            $table->date('date_added'); 
            $table->decimal('electra_1');
            $table->decimal('electra_2');
            $table->decimal('reject_water');
            $table->decimal('supply_water_1');
            $table->decimal('supply_water_2');
            $table->decimal('irrigation_water');
            $table->decimal('ground_water');
            $table->decimal('ec_padwall_water');
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
        Schema::dropIfExists('nahel_utilities');
    }
}
