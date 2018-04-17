<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test',function (){
    return view('test');
});

Route::get('/condition', function ()
{
    return view('condition_test');
});

Route::get('/employee_one', function () {
    return view('employees.new_employee');
});

Route::get('/instance', function () {
    return view('instance_test');
});

Route::get('/first_challenge','FirstChallenge@first_game');






