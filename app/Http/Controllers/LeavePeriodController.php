<?php

namespace App\Http\Controllers;

use App\LeavePeriod;
use Illuminate\Http\Request;

class LeavePeriodController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except(['_token']);
        $leave_period = LeavePeriod::create($requests);
        if($leave_period)
        {
            return response()->json(['success' => true, 'data' => $leave_period]);
        }
        else
        {
            return response()->json(['success' => false, 'data' => null]);
        }

    }

    public function editPost(Request $request)
    {
        $requests = $request->except('_except','id');
        $leave_period_edit = LeavePeriod::where('id',$request->id)->first()->update($requests);
        if ($leave_period_edit)
        {
            return response()->json(['success' => true, 'data' => $leave_period_edit]);
        }
        else
        {
            return response()->json(['success' => false, 'data' => null ]);
        }
    }
}
