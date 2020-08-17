<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Activity;
use App\Model\DayActivity;
use App\Model\DayMeal;
use App\Model\Food;
use App\Model\Meal;
use App\Model\PersonalMeal;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $meals = Meal::all();
        $activity = Activity::all();
        $foods = Food::all();
        $title = self::TITLE;

        return view(self::FOLDER . ".index", compact('user', 'title', 'activity', 'meals', 'foods'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addActivity(Request $request)
    {
        $data = new DayActivity();
        $data->user_id = $request->id;
        $data->activity_id = $request->activity;
        $data->date = $request->date;
        $data->from = $request->from;
        $data->to = $request->to;
        $data->save();

        return response()->json(['success' => "Your activity has been saved."], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addMeal(Request $request)
    {
        $data = $request->all();
        $request->validate([
            "meal" => "required",
            "food" => "required|array|min:1",
            "mass" => "required|array|min:1",
            "total_mass" => "required|numeric",
            "total_carbs" => "required|numeric",
            "total_fat" => "required|numeric",
            "total_proteins" => "required|numeric",
            "total_calories" => "required|numeric",
            "total_ph" => "required|numeric",
            "total_glycemic_load" => "required|numeric",
        ]);
        $meal_name = Meal::where('id', $request->meal)->first()->name;

        DB::beginTransaction();

        $personal_meal = new PersonalMeal;
        $personal_meal->name = $meal_name;
        $personal_meal->mass = $data['total_mass'];
        $personal_meal->carbs = $data['total_carbs'];
        $personal_meal->fat = $data['total_fat'];
        $personal_meal->proteins = $data['total_proteins'];
        $personal_meal->calories = $data['total_calories'];
        $personal_meal->ph = $data['total_ph'];
        $personal_meal->glycemic_load = $data['total_glycemic_load'];
        $personal_meal->save();

        $arr = array();
        foreach ($data['food'] as $bin => $key) {
            $arr[$bin]['personal_meal_id'] = $personal_meal->id;
            $arr[$bin]['food_id'] = $key;
            $arr[$bin]['mass'] = $data['mass'][$bin];
        }

        $personal_meal->attachedFoods()->createMany($arr);

        $dayMeal = new DayMeal;
        $dayMeal->user_id = $data['id'];
        $dayMeal->personal_meal_id = $personal_meal->id;
        $dayMeal->date = $data['date'];
        $dayMeal->from = $data['from'];
        $dayMeal->to = $data['to'];
        $dayMeal->save();

        DB::commit();

        return response()->json(['success' => "Your meal has been saved."], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMeal(Request $request)
    {
        $data = $request->all();
        $request->validate([
            "name" => "required",
            "food" => "required|array|min:1",
            "mass" => "required|array|min:1",
            "total_mass" => "required|numeric",
            "total_carbs" => "required|numeric",
            "total_fat" => "required|numeric",
            "total_proteins" => "required|numeric",
            "total_calories" => "required|numeric",
            "total_ph" => "required|numeric",
            "total_glycemic_load" => "required|numeric",
        ]);

        DB::beginTransaction();
        $meal = new Meal;
        $meal->name = $data['name'];
        $meal->mass = $data['total_mass'];
        $meal->carbs = $data['total_carbs'];
        $meal->fat = $data['total_fat'];
        $meal->proteins = $data['total_proteins'];
        $meal->calories = $data['total_calories'];
        $meal->ph = $data['total_ph'];
        $meal->glycemic_load = $data['total_glycemic_load'];
        $meal->save();

        $arr = array();
        foreach ($data['food'] as $bin => $key) {
            $arr[$bin]['meal_id'] = $meal->id;
            $arr[$bin]['food_id'] = $key;
            $arr[$bin]['mass'] = $data['mass'][$bin];
        }
        $meal->attachedFoods()->createMany($arr);
        DB::commit();
        return response()->json(array('msg' => 'Successfully Form Submit', 'status' => true, 'meal' => $meal));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllData(Request $request)
    {
        $user_id = $request->id;
        $date = $request->date;

        $activity = DayActivity::with('getActivity')->where(["user_id" => $user_id, "date" => $date])->get();
        $meals = DayMeal::with('getMeals')->where(["user_id" => $user_id, "date" => $date])->get();

        $data = array(
            'activity' => $activity,
            'meal' => $meals,
        );

        return response()->json($data, 200);
    }

    public function getMealAjax(Request $request)
    {
        $id = $request->id;
        $meal = Meal::with('attachedFoods', 'foods')->where('id', $id)->first();
        return response()->json($meal);
    }
}
