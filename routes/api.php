<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\NurseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* 
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for this application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group.
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {  //because of this middleware(api), each route contains 'api' unlike the normal routes
    return $request->user();
});


/**
 * ------------------------------------------------
 * PersonControler Methods 
 * ------------------------------------------------
 * getAll()
 * getPersonById()
 * postPerson()
 * updatePerson()
 * deletePerson()
 * generatePDFReport()  - To generate PDF report
 * generateHTMLReport() - To generate HTML report
 */
Route::get('/person/all', [PersonController::class, 'getAll']);
Route::get('/person/get/{id}', [PersonController::class, 'getPersonById']);
Route::post('/person/add', [PersonController::class, 'postPerson']);
Route::put('/person/update/{id}', [PersonController::class, 'updatePerson']);
Route::delete('/person/delete/{id}', [PersonController::class, 'deletePerson']);
Route::get('/person/report/pdf', [PersonController::class, 'generatePDFReport']);
Route::get('/person/report/html', [PersonController::class, 'generateHTMLReport']);

//routes of Nurse management section
Route::get('/nurses/all', [NurseController::class, 'getAll']);
Route::post('/nurses/add', [NurseController::class, 'addNurse']);
Route::get('/nurses/get/{id}', [NurseController::class, 'getNurseByID']);
Route::put('/nurses/update/{id}', [NurseController::class, 'updateNurse']);
Route::delete('/nurses/delete/{id}', [NurseController::class, 'deleteNurse']);
Route::get('/nurses/report/pdf', [NurseController::class, 'generatePDFReport']);