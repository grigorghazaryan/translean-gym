<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DayActivity extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getActivity()
    {
        return $this->hasOne("App\Model\Activity", "id", "activity_id");
    }
}
