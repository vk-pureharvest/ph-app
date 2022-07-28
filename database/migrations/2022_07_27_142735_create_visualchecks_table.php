<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisualchecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visualchecks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('date_added');
            $table->string('site_name');
            $table->string('product_type');
            $table->string('sample'); 
            $table->string('quality');
            $table->string('order_variety');
            $table->string('appearance');
            $table->string('batch');
            $table->string('sticker');
            $table->string('weight');
            $table->string('packaging');
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
        Schema::dropIfExists('visualchecks');
    }
}
