<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrawberryShelfLivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strawberry_shelf_lives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('site_name');
            $table->date('testing_date'); 
            $table->string('day_of_testing');
            $table->string('date_harvested');
            $table->string('product_type');
            $table->string('class');
            $table->decimal('weight',10,2);
            $table->decimal('height',10,2);
            $table->decimal('width',10,2);
            $table->decimal('BRIX',10,2);
            $table->decimal('color_L',10,2);
            $table->decimal('color_A',10,2);
            $table->decimal('color_B',10,2);
            $table->integer('color_rank');
            $table->decimal('firmness',10,2);
            $table->integer('firmness_rank');
            $table->string('remarks');
            $table->string('image');
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
        Schema::dropIfExists('strawberry_shelf_lives');
    }
}
