<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except(['_token']);
        $languages = Language::create($requests);

        if($languages)
        {
          return response()->json(['success' => true, 'data'=>$languages]);
        }
        else
        {
            return response()->json(['success'=>false, 'data'=>null]);
        }
    }

}
