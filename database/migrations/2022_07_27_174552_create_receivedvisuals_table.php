<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivedvisualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivedvisuals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('date_added');
            $table->string('site_name');
            $table->string('product_type');
            $table->string('sample'); 
            $table->string('color');
            $table->string('size');
            $table->string('spots');
            $table->string('fungus');
            $table->string('wrinkles');
            $table->string('softness');
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
        Schema::dropIfExists('receivedvisuals');
    }
}
