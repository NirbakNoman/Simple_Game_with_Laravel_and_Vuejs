<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except('_token');
        $insert_job = Job::create($requests);

        if($insert_job)
        {
            return response()->json(['success' => true, 'data' => $insert_job]);
        }
        else
        {
            return response()->json(['success' => false, 'data' => null]);
        }
    }

    public function editPost(Request $request)
    {
        $requests = $request->except(['_token','id']);
        $job_id = $request->job_id;
        $job_info = Job::where('id',$job_id)->first()->update($requests);
        if($job_info)
        {
            return response()->json(['success' =>true, 'data' =>$job_info]);
        }
        else
        {
            return response()->json(['success' =>false, 'data' =>null ]);
        }
    }
}
