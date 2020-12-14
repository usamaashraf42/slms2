<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicantEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applicant_education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('job_applicant_id');
            $table->integer('degree_id');
            $table->integer('institute_id');
            $table->integer('degree_type');
            $table->integer('passing_year');
            $table->integer('degree_percentage');
            $table->string('degree_grade');
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
        Schema::dropIfExists('job_applicant_education');
    }
}
