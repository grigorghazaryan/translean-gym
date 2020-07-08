<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    const FOLDER = "admin.activity";
    const TITLE = "Activities";
    const ROUTE = "/activities";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Activity::all();
        $title = self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . ".index", compact("title", "route", "data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = self::TITLE;
        $route = self::ROUTE;
        $action = "Create";
        return view(self::FOLDER . ".create", compact("title", "route", 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "met" => "required|numeric",
            "carb_ratio" => "required|numeric",
            "fat_ratio" => "required|numeric",
        ]);

        $activity = new Activity;
        $activity->name = $request->name;
        $activity->met = $request->met;
        $activity->carb_ratio = $request->carb_ratio;
        $activity->fat_ratio = $request->fat_ratio;
        $activity->save();

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $title = self::TITLE;
        $route = self::ROUTE;
        $action = "Edit";
        return view(self::FOLDER . ".edit", compact("title", "route", 'action', "activity"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            "name" => "required",
            "met" => "required|numeric",
            "carb_ratio" => "required|numeric",
            "fat_ratio" => "required|numeric",
        ]);

        $activity->name = $request->name;
        $activity->met = $request->met;
        $activity->carb_ratio = $request->carb_ratio;
        $activity->fat_ratio = $request->fat_ratio;
        $activity->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        Activity::destroy($activity->id);
        return redirect(self::ROUTE);
    }
}
