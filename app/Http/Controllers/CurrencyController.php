<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function addPost(Request $request)
    {
        $requests = $request->except('_token');
        $insertCurrency = Currency::create($requests);
        if($insertCurrency)
        {
            return response()->json(['success' => true, 'data' => $insertCurrency]);
        }
        else
        {
            return response()->json(['success' => false, 'data' => null]);
        }
    }

    public function editPost(Request $request)
    {
        $requests = $request->except(['_token','id']);
        $currency_id = $request->currency_id;
        $currency = Currency::where('id',$currency_id)->first()->update($requests);
        if($currency)
        {
            return response()->json(['success' =>true, 'data' =>$currency]);
        }
        else
        {
            return response()->json(['success' =>false, 'data' =>null ]);
        }
    }
}
