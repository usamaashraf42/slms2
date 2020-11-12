<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_shifts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('branch_id')->nullable();
            $table->integer('dep_id')->nullable();

            $table->string('title')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();

            $table->time('relaxation_start_time')->nullable();
            $table->time('relaxation_end_time')->nullable();
            
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

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
        Schema::dropIfExists('employee_shifts');
    }
}
