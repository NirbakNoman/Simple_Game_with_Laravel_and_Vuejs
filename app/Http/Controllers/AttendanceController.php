<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except(['_token']);
        $emp_attendance = Attendance::create($requests);

        if($emp_attendance)
        {
            return response()->json(['success' => true, 'data'=>$emp_attendance]);
        }
        else
        {
            return response()->json(['success'=>false, 'data'=>null]);
        }
    }

    public function editPost(Request $request)
    {
        $requests = $request->except(['_token','id']);
        $attendance_id = $request->attendance_id;
        $attendance = Attendance::where('id',$attendance_id)->first()->update($requests);
        if($attendance)
        {
            return response()->json(['success' =>true, 'data' =>$attendance]);
        }
        else
        {
            return response()->json(['success' =>false, 'data' =>null ]);
        }
    }
}
