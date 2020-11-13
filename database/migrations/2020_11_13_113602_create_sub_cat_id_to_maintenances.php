<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCatIdToMaintenances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maintenances', function (Blueprint $table) {
            $table->integer('sub_cat_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maintenances', function (Blueprint $table) {
            $table->integer('sub_cat_id')->nullable();
        });
    }
}
