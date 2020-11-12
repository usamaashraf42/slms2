<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_product_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pro_cat_name');
            $table->boolean('status')->default(1)->nullable();
            $table->text('description')->nullable();

            $table->integer('parent_id')->nullable();
            $table->string('type')->nullable();

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
        Schema::dropIfExists('inv_product_categories');
    }
}
