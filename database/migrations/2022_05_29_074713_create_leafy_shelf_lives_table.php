<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeafyShelfLivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leafy_shelf_lives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('site_name');
            $table->date('testing_date'); 
            $table->string('day_of_testing');
            $table->string('date_harvested');
            $table->string('product_type');
            $table->integer('smell');
            $table->integer('texture');
            $table->string('cracks');
            $table->string('wrinkles');
            $table->string('color');
            $table->string('spots');
            $table->integer('dryness');
            $table->integer('crunch');
            $table->string('image');
            $table->string('remarks');
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
        Schema::dropIfExists('leafy_shelf_lives');
    }
}
