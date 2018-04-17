<?php

namespace App\Http\Controllers;

use App\Education;
use App\Employee;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except(['_token']);
        $employeeInfo = Employee::create($requests);
        if($employeeInfo){
            return response()->json(["success"=>true,"data"=>$employeeInfo]);
        }else{
            return response()->json(["success"=>false,"data"=>null]);
        }
    }

    public function editPost(Request $request)
    {
        $requests = $request->except(['_token', 'id']);
        $employee_id = $request->employee_id;
        $employee_info = Employee::where('id',$employee_id)->first()->update($requests);
        if($employee_info){
            return response()->json(["success"=>true,"data"=>$employee_info]);
        }else{
            return response()->json(["success"=>false,"data"=>null]);
        }
    }


    public function assignEducation(Request $request){
        //$requests = $request->except(['_token']);
        $employee_id = $request->employee_id;
        $degree_id = $request->degree_id;

        $employee = Employee::where("id",$employee_id)->first();
        //dd($employee);
        //$education = Education::where("id",$degree_id)->first();
        $employee->education()->attach($degree_id,[
            "passed_year" => $request->passed_year,
            "cgpa" => $request->cgpa
        ]);

    }


    public function assignLanguage(Request $request){
        //$requests = $request->except(['_token']);
        $employee_id = $request->employee_id;
        $language_id = $request->language_id;

        $employee = Employee::where("id",$employee_id)->first();
//        dd($employee);
        //$education = Education::where("id",$degree_id)->first();
        $employee->language()->attach($language_id);
//
    }

    public function assignSkill(Request $request)
    {
        $employee_id = $request->employee_id;
        $skill_id = $request->skill_id;

        $employee_info = Employee::where('id',$employee_id)->first();

        $rowBeforeInsert = DB::table('employee_skill')->count();

        $emp_skill_insert = $employee_info->skill()->attach($skill_id,[
            'year_of_experiance' => $request->year_of_experiance
        ]);

        $rowAfterInsert = DB::table('employee_skill')->count();
        $data = Employee::with('skill')->take($rowAfterInsert)->where('id',$employee_id)->first();
        $skills = $data->skill->get($rowAfterInsert-2);
        if ($rowAfterInsert>$rowBeforeInsert)
        {
            return response()->json(['success' => true, 'data' => $skills ]);
        }
        else
        {
            return response()->json(['success' => false, 'data' => null]);
        }

    }

    public function assignLicense(Request $request)
    {
        $employee_id = $request->employee_id;
        $license_id = $request->license_id;

        $employee_info = Employee::where('id',$employee_id)->first();
        $emp_license_insert = $employee_info->license()->attach($license_id,[
           'issued_date' => $request->issued_date,
            'expiry_date' => $request->expiry_date
        ]);

    }

    public function assignMembership(Request $request)
    {
        $employee_id = $request->employee_id;
        $membership_id =$request->membership_id;

        $employee_info = Employee::where('id',$employee_id)->first();
        $emp_membershipship = $employee_info->membership()->attach($membership_id,[
            'subscription_paid_by' => $request->subscription_paid_by,
            'subscription_amount' => $request->subscription_amount,
            'currency_id' => $request->currency_id,
            'subscription_commence_date' => $request->subscription_commence_date,
            'subscription_renewal_date' => $request->subscription_renewal_date,

        ]);
    }

    public function assignJob(Request  $request)
    {
        $employee_id = $request->employee_id;
        $job_id = $request->job_id;

        $employee_info = Employee::where('id',$employee_id)->first();
        $emp_job = $employee_info->job()->attach($job_id,[
            'employment_status_id' => $request->employment_status_id,
            'joining_date' => $request->joining_date
        ]);

    }

    public function assignWorkShift(Request $request)
    {
        $employee_id = $request->employee_id;
        $work_shift_id = $request->work_shift_id;

        $employee_info = Employee::where('id',$employee_id)->first();

        $employee_info->workShift()->attach($work_shift_id,[
            'date' => $request->date
        ]);
    }

    public function employeeLeaveRequest(Request $request)
    {
        $employee_id = $request->employee_id;
        $leave_type_id = $request->leave_type_id;
        $employee_info = Employee::where('id',$employee_id)->first();
        $employee_info->leaveRequest()->attach($leave_type_id,[
            'leave_start_date' => $request->leave_start_date,
            'leave_end_date' => $request->leave_end_date,
            'leave_duration' => $request->leave_duration,
            'leave_reason' => $request->leave_reason,
            'leave_status_id' => $request->leave_status_id
        ]);
    }


    public function employeeLeavePeriod(Request $request)
    {
        $employee_id = $request->employee_id;
        $leave_type_id = $request->leave_type_id;
        $employee_info = Employee::where('id',$employee_id)->first();
        $employee_info->leavePeriod()->attach($leave_type_id,[
            'leave_period_start' => $request->leave_period_start,
            'leave_period_end' => $request->leave_period_end,
            'number_of_leave_days' => $request->number_of_leave_days

        ]);
    }

}
