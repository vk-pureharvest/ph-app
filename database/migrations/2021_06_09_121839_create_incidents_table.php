<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reported_by'); 
            $table->date('date_received');
            $table->string('title');
            $table->string('type_of_incident'); 
            $table->string('emp_name');
            $table->string('emp_title');
            $table->string('location'); 
            $table->string('sp_loc');
            $table->text('addn_people');
            $table->text('witnesses');
            $table->text('incident_desc');
            $table->text('root_cause');
            $table->text('action_exec');
            $table->text('action_plan');
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
        Schema::dropIfExists('incidents');
    }
}
