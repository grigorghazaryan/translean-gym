<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserAssessments extends Model
{
   const TYPE = array(0=>'assessment', 2=>'projection', 1=>'current');
}
