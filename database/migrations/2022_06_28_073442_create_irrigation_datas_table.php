<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIrrigationDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irrigation_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('site_name');
            $table->date('date_added'); 
            $table->string('metric');
            $table->decimal('rad_sum');
            $table->decimal('v_70');
            $table->decimal('v_80'); 
            $table->decimal('v_90');
            $table->decimal('v_100');
            $table->decimal('v_110'); 
            $table->decimal('v_120');
            $table->decimal('v_130');
            $table->decimal('v_140'); 
            $table->decimal('v_150');
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
        Schema::dropIfExists('irrigation_datas');
    }
}
