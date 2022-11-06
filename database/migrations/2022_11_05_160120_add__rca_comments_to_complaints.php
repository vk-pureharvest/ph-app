<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRcaCommentsToComplaints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complaints', function ($table) {
            $table->string('RCA')->default('');
            $table->string('internal_resolution')->default('');
            $table->string('customer_resolution')->default('');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complaints', function ($table) {
            $table->dropColumn('RCA');
            $table->dropColumn('internal_resolution');
            $table->dropColumn('customer_resolution');

        });
    }
}
