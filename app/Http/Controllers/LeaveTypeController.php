<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobTitle;
use App\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except(['_token']);
        $leave_type = LeaveType::create($requests);
        if($leave_type){
            return response()->json(["success"=>true, "data"=>$leave_type]);
        }else{
            return response()->json(["success"=>false, "data"=>null]);
        }
    }

    public function editPost(Request $request)
    {
        $requests = $request->except('_except','id');
        $leave_type_edit = LeaveType::where('id',$request->id)->first()->update($requests);
        if ($leave_type_edit)
        {
            return response()->json(['success' => true, 'data' => $leave_type_edit]);
        }
        else
        {
            return response()->json(['success' => false, 'data' => null ]);
        }
    }


    public function assignLeaveRule(Request $request)
    {
       $job_id = $request->job_id;
       $leave_type_id = $request->leave_type_id;
       $job_info = Job::where('id',$job_id)->first();

       $job_info->leaveRule()->attach($leave_type_id,[
            'alloted_leaves_number' => $request->alloted_leaves_number
       ]);
    }

}
