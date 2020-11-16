<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_name')->nullable();
            $table->integer('cat_type')->nullable();
            $table->Integer('month')->nullable();
            $table->Integer('year')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
        });
    }

//    1 teacher
//    2 student
//    3 parent

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_categories');
    }
}
