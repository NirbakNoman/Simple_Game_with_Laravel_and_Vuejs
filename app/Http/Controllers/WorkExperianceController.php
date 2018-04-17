<?php

namespace App\Http\Controllers;

use App\WorkExperiance;
use Illuminate\Http\Request;

class WorkExperianceController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except(['_token']);
        $emp_work_experiance = WorkExperiance::create($requests);
        if($emp_work_experiance){
            return response()->json(["success"=>true,"data"=>$emp_work_experiance]);
        }else{
            return response()->json(["success"=>false,"data"=>null]);
        }
    }

    public function editPost(Request $request)
    {
        $requests = $request->except(['_token','id']);
        $work_experiance_id = $request->work_experiance_id;
        $work_experiance = WorkExperiance::where('id',$work_experiance_id)->first()->update($requests);
        if($work_experiance)
        {
            return response()->json(['success' =>true, 'data' =>$work_experiance]);
        }
        else
        {
            return response()->json(['success' =>false, 'data' =>null ]);
        }
    }
}
