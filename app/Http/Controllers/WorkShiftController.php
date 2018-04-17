<?php

namespace App\Http\Controllers;

use App\WorkShift;
use Illuminate\Http\Request;

class WorkShiftController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except(['_token']);
        $work_shifts = WorkShift::create($requests);

        if($work_shifts)
        {
            return response()->json(['success' => true, 'data'=>$work_shifts]);
        }
        else
        {
            return response()->json(['success'=>false, 'data'=>null]);
        }
    }
}
