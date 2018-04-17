<?php

namespace App\Http\Controllers;

use App\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except(['_token']);
        $memberships = Membership::create($requests);
        if ($memberships)
        {
            return response()->json(['success' => true, 'data' => $memberships]);
        }
        else
        {
            return response()->json(['success' => true, 'data' => null ]);
        }
    }

}
