<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\MetRange;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MetRangeController extends Controller
{
    const FOLDER = "admin.settings.met";
    const TITLE = "MET Range";
    const ROUTE = "/met-range";

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MetRange::all();
        $title = self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . ".index", compact('title', 'route', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = self::TITLE;
        $action = self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . ".create", compact('title', 'route', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "lower_limit" => "required|array",
            "upper_limit" => "required|array",
            "met_variable" => "required|array",
        ]);

        $arr = array();
        foreach ($request->lower_limit as $key => $val) {
            $arr[$key]['lower_limit'] = $request->lower_limit[$key];
            $arr[$key]['upper_limit'] = $request->upper_limit[$key];
            $arr[$key]['met_variable'] = $request->met_variable[$key];
            $arr[$key]['created_at'] = Carbon::now();
            $arr[$key]['updated_at'] = Carbon::now();
        }

        MetRange::insert($arr);

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     * @param \App\Model\MetRange $metRange
     * @return \Illuminate\Http\Response
     */
    public function show(MetRange $metRange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Model\MetRange $metRange
     * @return \Illuminate\Http\Response
     */
    public function edit(MetRange $metRange)
    {
        $title = self::TITLE;
        $action = self::TITLE;
        $route = self::ROUTE;
        $data = $metRange;
        return view(self::FOLDER . ".edit", compact('title', 'route', 'action', 'data'));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Model\MetRange      $metRange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MetRange $metRange)
    {
        $request->validate([
            "lower_limit" => "required",
            "upper_limit" => "required",
            "met_variable" => "required",
        ]);

        $metRange->lower_limit = $request->lower_limit;
        $metRange->upper_limit = $request->upper_limit;
        $metRange->met_variable = $request->met_variable;
        $metRange->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Model\MetRange $metRange
     * @return \Illuminate\Http\Response
     */
    public function destroy(MetRange $metRange)
    {
        MetRange::destroy($metRange->id);
        return redirect(self::ROUTE);
    }
}
