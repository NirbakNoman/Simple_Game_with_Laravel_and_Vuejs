<?php

namespace App\Http\Controllers;

use App\EmploymentStatus;
use Illuminate\Http\Request;

class EmploymentStatusController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except(['_token']);
        $emp_status = EmploymentStatus::create($requests);
        if ($emp_status)
        {
            return response()->json(['success' => true, 'data' => $emp_status]);
        }
        else
        {
            return response()->json(['success' => true, 'data' =>null]);
        }
    }

    public function editPost(Request $request)
    {
        $requests = $request->except(['_token','id']);
        $employment_status_id = $request->employment_status_id;
        $employment_status = EmploymentStatus::where('id',$employment_status_id)->first()->update($requests);
        if($employment_status)
        {
            return response()->json(['success' =>true, 'data' =>$employment_status]);
        }
        else
        {
            return response()->json(['success' =>false, 'data' =>null ]);
        }
    }
}
