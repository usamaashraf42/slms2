<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicatExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applicat_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('job_applicant_id');
            $table->integer('institute_id');
            $table->integer('teachering_sub_id');
            $table->string('curriculum');
            $table->date('exp_to');
            $table->date('exp_from');
            $table->integer('class_id');
            $table->string('current_job');
            $table->string('image');
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
        Schema::dropIfExists('job_applicat_experiences');
    }
}
