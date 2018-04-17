<?php

namespace App\Http\Controllers;

use App\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except(['_token']);
        $holiday = Holiday::create($requests);
        if($holiday){
            return response()->json(["success"=>true, "data"=>$holiday]);
        }else{
            return response()->json(["success"=>false, "data"=>null]);
        }
    }

    public function editPost(Request $request)
    {
        $requests = $request->except(['_token','id']);
        $holiday = Holiday::where("id",$request->id)->update($requests);
        if($holiday){
                return response()->json(["success"=>true, "data"=>$holiday]);
        }else{
            return response()->json(["success"=>false, "data"=>null]);
        }
    }
}
