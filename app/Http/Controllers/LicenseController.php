<?php

namespace App\Http\Controllers;

use App\License;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except(['_token']);
        $licenses = License::create($requests);
        if ($licenses)
        {
            return response()->json(['success' => true, 'data' => $licenses]);
        }
        else
        {
            return response()->json(['success' => false, 'data' => null]);
        }
    }
}
