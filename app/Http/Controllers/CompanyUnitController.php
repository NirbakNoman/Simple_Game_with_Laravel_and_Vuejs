<?php

namespace App\Http\Controllers;

use App\CompanyUnit;
use Illuminate\Http\Request;

class CompanyUnitController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except(['_token']);
        $company_unit_insert = CompanyUnit::create($requests);
        if ($company_unit_insert)
        {
            return response()->json(['success' => true, 'data' => $company_unit_insert]);
        }
        else
        {
            return response()->json(['success' => false, 'data' => null]);
        }
    }

    public function editPost(Request $request)
    {
        $requests = $request->except(['_token', 'id']);
        $company_unit_id = $request->company_unit_id;
        $company_unit = CompanyUnit::where('id',$company_unit_id)->first()->update($requests);
        if($company_unit){
            return response()->json(["success"=>true,"data"=>$company_unit]);
        }
        else
        {
            return response()->json(["success"=>false,"data"=>null]);
        }
    }
}
