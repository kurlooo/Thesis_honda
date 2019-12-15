<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkbayLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workbay_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tech_id');
            $table->string('emp_id');
            $table->string('workbay_id');
            $table->timestamp('time_in');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workbay_log');
    }
}
