<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueuingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queuing', function (Blueprint $table) {
            $table->string('queue_id');
            $table->string('plate_no')->nullable();
            $table->string('cust_name')->nullable();
            $table->string('date')->nullable();
            $table->string('reg_address')->nullable();
            $table->string('time_in')->nullable();
            $table->string('engine_no')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('km_reading')->nullable();
            $table->string('model')->nullable();
            $table->string('transmission')->nullable();
            $table->string('color')->nullable();
            $table->string('svc_request')->nullable();
            $table->string('ds_full')->nullable();
            $table->string('ds_int')->nullable();
            $table->string('ds_ext')->nullable();
            $table->string('ds_eng')->nullable();
            $table->string('ds_rust')->nullable();
            $table->string('full_remarks')->nullable();
            $table->string('int_remarks')->nullable();
            $table->string('ext_remarks')->nullable();
            $table->string('engine_remarks')->nullable();
            $table->string('rustproof_remarks')->nullable();
            $table->string('guard_name')->nullable();
            $table->timestamps();
            $table->primary('queue_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queuing');
    }
}
