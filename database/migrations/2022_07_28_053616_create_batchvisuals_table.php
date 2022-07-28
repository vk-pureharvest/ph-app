<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchvisualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batchvisuals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('date_added');
            $table->string('site_name');
            $table->string('product_type');
            $table->string('sample');
            $table->string('batch_code'); 
            $table->string('expiry_date');
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
        Schema::dropIfExists('batchvisuals');
    }
}
