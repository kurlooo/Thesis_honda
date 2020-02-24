<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklisting', function (Blueprint $table) {
            $table->bigIncrements('check_id');
            $table->string('plate_no')->nullable();
            $table->string('cust_name')->nullable();
            $table->string('engine_no')->nullable();
            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->string('job_care')->nullable();
            $table->string('battery')->nullable();
            $table->string('gas')->nullable();
            $table->string('mileage')->nullable();
            $table->string('fleft_tr')->nullable();
            $table->string('fleft_con')->nullable();
            $table->string('fright_tr')->nullable();
            $table->string('fright_con')->nullable();
            $table->string('rleft_tr')->nullable();
            $table->string('rleft_con')->nullable();
            $table->string('rright_tr')->nullable();
            $table->string('rright_con')->nullable();
            $table->string('clister_com')->nullable();
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
        Schema::dropIfExists('checklisting');
    }
}
