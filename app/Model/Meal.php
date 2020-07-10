<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{

    public function attachedFoods()
    {
        return $this->hasMany("App\Model\MealsFood", "meal_id", "id");
    }

    public function foods()
    {
        return $this->hasManyThrough("App\Model\Food", "App\Model\MealsFood", "meal_id", "id", "id", "food_id");
    }

}
