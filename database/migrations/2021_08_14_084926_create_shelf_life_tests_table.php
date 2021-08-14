<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShelfLifeTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelf_life_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('site_name');
            $table->date('testing_date'); 
            $table->date('harvest_date');
            $table->string('product_type');
            $table->decimal('BRIX', 10, 2);
            $table->decimal('color_L')->nullable();
            $table->decimal('color_A')->nullable();
            $table->decimal('color_B')->nullable();
            $table->decimal('weight', 10, 2)->nullable();
            $table->decimal('length', 10, 2);
            $table->decimal('width', 10, 2);
            $table->decimal('pressure', 10, 2);
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
        Schema::dropIfExists('shelf_life_tests');
    }
}
