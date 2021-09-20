<?php

use App\Http\Controllers\DeletedPersonController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PersonVaccineController;
use App\Http\Controllers\VaccineController;
use App\Models\PersonVaccine;
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
 * getAll() @return json response
 * getPersonById() @return json response
 * postPerson() @return json response
 * updatePerson() @return json response
 * deletePerson() @return json response
 * getCount() @return integer
 * generatePDFReport() @return PDF download
 * generateHTMLReport() @return view (blade file)
 * ------------------------------------------------
 */

// Get all Persons
Route::get('/person/all', [PersonController::class, 'getAll']);
// Get a person by id
Route::get('/person/get/{id}', [PersonController::class, 'getPersonById']);
// Insert a person
Route::post('/person/add', [PersonController::class, 'postPerson']);
// Update a person by id
Route::put('/person/update/{id}', [PersonController::class, 'updatePerson']);
// Delete a person by id
Route::delete('/person/delete/{id}', [PersonController::class, 'deletePerson']);
// Count records of all persons
Route::get('/person/count', [PersonController::class, 'getCount']);
// Get all deleted persons
Route::get('/person/all/deleted', [DeletedPersonController::class, 'getAll']);
// Generate report as pdf
Route::get('/person/report/pdf', [PersonController::class, 'generatePDFReport']);
// Generate report view with HTML (blade file)
Route::get('/person/report/html', [PersonController::class, 'generateHTMLReport']);
// Get all person details with vaccination details
Route::get('/person-vaccine/all/{id}', [PersonVaccineController::class, 'getByNIC']);
// Get vaccine details by person details