<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobctrlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobctrl', function (Blueprint $table) {
            $table->integer('RO_no');
            $table->string('workbay_id');
            $table->string('cust_name');
            $table->string('plate_no',8);
            $table->string('model');
            $table->string('pro_time')->nullable();
            $table->time('time_in1')->nullable();
            $table->time('time_out1')->nullable();
            $table->time('time_in2')->nullable();
            $table->time('time_out2')->nullable();
            $table->string('total_time')->nullable();
            $table->string('total_time2')->nullable();
            $table->string('frt')->nullable();
            $table->string('frt2')->nullable();
            $table->integer('hour')->nullable();
            $table->integer('min')->nullable();
            $table->string('tech_name');
            $table->time('qc')->nullable();
            $table->time('rlsd')->nullable();
            $table->integer('flag')->nullable();
            $table->integer('flag2')->nullable();
            $table->timestamps();
            $table->primary('RO_no');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobctrl');
    }
}
