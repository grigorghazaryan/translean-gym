<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalMealFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_meal_food', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personal_meal_id');
            $table->unsignedBigInteger('food_id');
            $table->integer('mass');
            $table->timestamps();

            $table->foreign('personal_meal_id')->references('id')->on('personal_meals')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('food_id')->references('id')->on('food')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_meal_food');
    }
}
