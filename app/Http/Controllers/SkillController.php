<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except(['_token']);
        $skills = Skill::create($requests);

        if($skills)
        {
            return response()->json(['success'=>true, 'data'=>$skills]);
        }
        else
        {
            return response()->json(['success'=>false, 'data'=>null]);
        }

    }
}
