<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use App\Model\UserAssessments;
use Illuminate\Support\Facades\DB;

class UserAssessmentsController extends Controller
{

    const FOLDER = "admin.assessment";
    const TITLE = "Assessments";

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $user = User::find($id);
        $assessments = UserAssessments::where('user_id', $id)->orderBy('type', 'ASC')->get();
        $title = self::TITLE;

        return view(self::FOLDER . ".index", compact('user', 'assessments', 'title'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if ($request->type == 1) {
            UserAssessments::where('user_id', $request->id)
                ->where('type', 1)
                ->update(['type' => 0]);
        }


        $user_assessment = new UserAssessments;
        $user_assessment->user_id = $request->id;
        $user_assessment->activity_level = $request->activity_level;
        $user_assessment->date = $request->date;
        $user_assessment->weight = $request->weight;
        $user_assessment->total_fat = $request->total_fat;
        $user_assessment->right_arm = $request->right_arm;
        $user_assessment->left_arm = $request->left_arm;
        $user_assessment->right_leg = $request->right_leg;
        $user_assessment->left_leg = $request->left_leg;
        $user_assessment->trunk = $request->trunk;
        $user_assessment->muscle_mass = $request->muscle_mass;
        $user_assessment->right_arm_mass = $request->right_arm_mass;
        $user_assessment->left_arm_mass = $request->left_arm_mass;
        $user_assessment->right_leg_mass = $request->right_leg_mass;
        $user_assessment->left_leg_mass = $request->left_leg_mass;
        $user_assessment->trunk_mass = $request->trunk_mass;
        $user_assessment->bone_mass = $request->bone_mass;
        $user_assessment->metabolic_age = $request->metabolic_age;
        $user_assessment->body_water = $request->body_water;
        $user_assessment->visceral_fat = $request->visceral_fat;
        $user_assessment->lean_mass = $request->lean_mass;
        $user_assessment->type = $request->type;
        $user_assessment->save();

        return response()->json(['success' => 'true']);
    }

    /**
     * @param Request $request
     */
    public function summary(Request $request)
    {
        $data = array();

        $first = UserAssessments::where(array('user_id' => $request->id, 'type' => 0))->first();
        $current = UserAssessments::where(array('user_id' => $request->id, 'type' => 1))->first();
        $projection = UserAssessments::where(array('user_id' => $request->id, 'type' => 2))->first();

        if (!empty($first)) {
            $first['type'] = 'First Assessment';
            $first['id'] = '1';
            $data[] = $first;
        }

        if (!empty($current)) {
            $current['type'] = 'Current Assessment';
            $current['id'] = '2';
            $data[] = $current;
        }

        if (!empty($projection)) {
            $projection['type'] = 'Projection';
            $projection['id'] = '3';
            $data[] = $projection;
        }

        return response()->json($data);
    }


    public function getAjax(Request $request)
    {
        $id = $request->id;
        $assessments = UserAssessments::where('user_id', $id)
            ->where('type', 0)
            ->orwhere('type', 1)
            ->orderBy('date', 'ASC')
            ->get();
        return response()->json($assessments);
    }

}
