<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('site_name');
            $table->date('date_added'); 
            $table->string('metric');
            $table->decimal('product_type');
            $table->decimal('pl_1')->nullable;
            $table->decimal('pl_2')->nullable; 
            $table->decimal('pl_3')->nullable;
            $table->decimal('pl_4')->nullable;
            $table->decimal('pl_5')->nullable;
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
        Schema::dropIfExists('plant_datas');
    }
}
