<?php

use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/test', function() {
    $myObj = array('results' => array('serial' => "P001", 'name' => 'Dineth Piyumantha', 'nic' => '972851990V', 'age' => 23, 'gender' => 'male', 'address' => '54/1, Maha Madagalla, Polpithigama'));
    return $myObj;
});

Route::get('/person/all', [PersonController::class, 'getAll']);