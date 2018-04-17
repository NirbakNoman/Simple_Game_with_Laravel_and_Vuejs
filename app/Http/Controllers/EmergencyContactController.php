<?php

namespace App\Http\Controllers;

use App\EmployeeEmergencyContact;
use Illuminate\Http\Request;

class EmergencyContactController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except(['_token']);
        $emergency_contacts = EmployeeEmergencyContact::create($requests);
        if ($emergency_contacts)
        {
            return response()->json(['success' => true, 'data' =>$emergency_contacts]);
        }
        else
        {
            return response()->json(['success' => false, 'data' => null]);
        }

    }
}
