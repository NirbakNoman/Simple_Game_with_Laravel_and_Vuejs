<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstChallenge extends Controller
{
    public function first_game()
    {
        return view('first_challenge');
    }
}
