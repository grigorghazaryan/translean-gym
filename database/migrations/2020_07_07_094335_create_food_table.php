<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191);
            $table->integer('quantity_measure');
            $table->float('carbs');
            $table->float('fat');
            $table->float('proteins');
            $table->float('calories')->comment('Carbs * 4 + Fat * 9 + Protein * 4');
            $table->float('fiber');
            $table->integer('glycemic_index');
            $table->float('glycemic_load')->comment('Glycemic_index * Carbs / 100');
            $table->float('ph');
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
        Schema::dropIfExists('food');
    }
}
