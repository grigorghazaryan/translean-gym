<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191);
            $table->integer('mass');
            $table->float('carbs');
            $table->float('fat');
            $table->float('proteins');
            $table->float('calories');
            $table->float('ph')->comment('Average (Sum of (Food Item Mass * PH) / total Mass)');
            $table->float('glycemic_load')->comment('Average (Sum of (Food Item Mass * Glycemic Load) / total Mass)');
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
        Schema::dropIfExists('meals');
    }
}
