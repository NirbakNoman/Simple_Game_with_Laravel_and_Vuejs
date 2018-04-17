<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function addPost(Request $request)
    {

        $requests = $request->except(['_token']);

        $location_info = Location::create($requests);

        if($location_info)
        {
            return response()->json(["success"=>true, "data" => $location_info]);
        }
        else
        {
            return response()->json(["success" => false, "data" => null]);
        }

    }
}
