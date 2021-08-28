<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\DoctorController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
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

Route::get('/doctor/all', [DoctorController::class, 'getAll']);
Route::get('/doctor/get/{id}', [DoctorController::class, 'getDoctorById']);
Route::post('/doctor/add', [DoctorController::class, 'postDoctor']);
Route::put('/doctor/update/{id}', [DoctorController::class, 'updateDoctor']);
Route::delete('/doctor/delete/{id}', [DoctorController::class, 'deleteDoctor']);