<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePORequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('p_o_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('requestor'); 
            $table->string('supplier');
            $table->string('account'); 
            $table->date('request_date');
            $table->decimal('amount');
            $table->string('terms');
            $table->string('status')->default('Pending Approval');
            $table->string('payment')->default('Pending');
            $table->string('comments');
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
        Schema::dropIfExists('p_o_requests');
    }
}
