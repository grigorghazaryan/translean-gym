<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Activity;
use App\Model\Meal;
use App\Model\User;
use Illuminate\Http\Request;

class DayController extends Controller
{
    const FOLDER = "admin.day";
    const TITLE = "Day View";

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $user = User::find($id);
        $title = self::TITLE;

        $activity = Activity::all();
        $meals = Meal::all();

        return view(self::FOLDER . ".index", compact('user','title', 'activity', 'meals'));
    }
}
