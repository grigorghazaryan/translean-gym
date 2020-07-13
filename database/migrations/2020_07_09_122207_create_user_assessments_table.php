<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_assessments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('activity_level');
            $table->date('date');

            $table->float('weight')->comment('kg');
            $table->float('total_fat')->comment('%');
            $table->float('right_arm')->comment('%');
            $table->float('left_arm')->comment('%');
            $table->float('right_leg')->comment('%');
            $table->float('left_leg')->comment('%');
            $table->float('trunk')->comment('%');

            $table->float('muscle_mass')->comment('kg');
            $table->float('right_arm_mass')->comment('kg');
            $table->float('left_arm_mass')->comment('kg');
            $table->float('right_leg_mass')->comment('kg');
            $table->float('left_leg_mass')->comment('kg');
            $table->float('trunk_mass')->comment('kg');
            $table->float('lean_mass')->comment('kg, bone mass + muscle mass');

            $table->float('bone_mass')->comment('kg');
            $table->integer('metabolic_age');
            $table->float('body_water')->comment('%');
            $table->integer('visceral_fat')->comment('rating');

            $table->integer('type')->comment('assessments or projections');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_assessments');
    }
}
