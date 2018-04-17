<?php

namespace App\Http\Controllers;

use App\EmployeeDependent;
use Illuminate\Http\Request;

class EmployeeDependentController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except(['_token']);
        $emp_dependent = EmployeeDependent::create([
            'employee_id' => $request->employee_id,
            'dependent_name' => $request->dependent_name

        ]);

        if ($emp_dependent)
        {
            return response()->json(['success' => true, 'data' => $emp_dependent]);
        }
       else
       {
           return response()->json(['success'=> false, 'data' => null]);
       }
    }
}
