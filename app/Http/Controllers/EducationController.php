<?php

namespace App\Http\Controllers;

use App\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function addGet(){

    }

    public function addPost(Request $request){
       $requests = $request->except(['_token']);
       $educationInfo = Education::create($requests);
       if($educationInfo){
            return response()->json(["success"=>true,"data"=>$educationInfo]);
       }else{
           return response()->json(["success"=>false,"data"=>null]);
       }
    }

    public function editGet(){

    }

    public function editPost(){

    }

    public function delete(){

    }
}
