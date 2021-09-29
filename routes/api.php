<?php
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\AdminController;
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


//------------------------------------------------------------
Route::get('/vaccine/all', [VaccineController::class, 'getAll']);
Route::get('/vaccine/get/{id}', [VaccineController::class, 'getVaccineById']);
Route::post('/vaccine/add', [VaccineController::class, 'postVaccine']);
Route::get('/vaccine/report/pdf', [VaccineController::class, 'generatePDFReport']);
Route::delete('/vaccine/delete/{id}', [VaccineController::class, 'deleteVaccine']);
Route::put('/vaccine/update/{id}', [VaccineController::class, 'updateVaccine']);


//------------------------------------------------------------
Route::post('/admin/add', [AdminController::class, 'postAdmin']);