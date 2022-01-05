<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeafyGreenPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leafy_green_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('site_name');
            $table->date('date_added'); 
            $table->string('product_type');
            $table->string('class');
            $table->decimal('box_weight');
            $table->decimal('no_of_punnets');
            $table->decimal('no_of_boxes');
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
        Schema::dropIfExists('leafy_green_packages');
    }
}
