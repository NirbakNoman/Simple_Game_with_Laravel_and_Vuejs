<?php

namespace App\Http\Controllers;

use App\PayGrade;
use Illuminate\Http\Request;

class PayGradeController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except(['_token']);
        $pay_grades = PayGrade::create($requests);
        if ($pay_grades)
        {
            return response()->json(['success' => true, 'data' => $pay_grades]);
        }
        else
        {
            return response()->json(['success' => true, 'data' =>null]);
        }
    }

    public function editPost(Request $request)
    {
        $requests = $request->except(['_token','id']);
        $pay_grade_id = $request->pay_grade_id;
        $pay_grade = PayGrade::where('id',$pay_grade_id)->first()->update($requests);
        if($pay_grade)
        {
            return response()->json(['success' =>true, 'data' =>$pay_grade]);
        }
        else
        {
            return response()->json(['success' =>false, 'data' =>null ]);
        }
    }
}
