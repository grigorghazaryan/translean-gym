<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DayMeal extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getMeals()
    {
        return $this->hasOne("App\Model\PersonalMeal", "id", "personal_meal_id");
    }
}
