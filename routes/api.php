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


/**
 * --------------------------
 * PersonControler Methods 
 * --------------------------
 * getAll()
 * getPersonById()
 * postPerson()
 * updatePerson()
 * deletePerson()
 */
Route::get('/person/all', [PersonController::class, 'getAll']);
Route::get('/person/get/{id}', [PersonController::class, 'getPersonById']);
Route::post('/person/add',[PersonController::class, 'postPerson']);
Route::put('/person/update/{id}', [PersonController::class, 'updatePerson']);
Route::delete('/person/delete/{id}', [PersonController::class, 'deletePerson']);
