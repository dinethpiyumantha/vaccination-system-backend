<?php
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
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

Route::get('/doctor/all', [DoctorController::class, 'getAll']);
Route::get('/doctor/get/{id}', [DoctorController::class, 'getDoctorById']);
Route::post('/doctor/add', [DoctorController::class, 'postDoctor']);
Route::put('/doctor/update/{id}', [DoctorController::class, 'updateDoctor']);
Route::delete('/doctor/delete/{id}', [DoctorController::class, 'deleteDoctor']);
// Generate report as pdf
Route::get('/doctor/report/pdf', [DoctorController::class, 'generatePDFReport']);
// Generate report view with HTML (blade file)
Route::get('/doctor/report/html', [DoctorController::class, 'generateHTMLReport']);

Route::get('/appointment/all', [AppointmentController::class, 'getAll']);
Route::get('/appointment/get/{id}', [AppointmentController::class, 'getAppointmentById']);
Route::post('/appointment/add', [AppointmentController::class, 'postAppointment']);
Route::put('/appointment/update/{id}', [AppointmentController::class, 'updateAppointment']);
Route::delete('/appointment/delete/{id}', [AppointmentController::class, 'deleteAppointment']);

//routes of Nurse management section
Route::get('/nurses/all', [NurseController::class, 'getAll']);
Route::post('/nurses/add', [NurseController::class, 'addNurse']);
Route::get('/nurses/get/{id}', [NurseController::class, 'getNurseByID']);
Route::put('/nurses/update/{id}', [NurseController::class, 'updateNurse']);
Route::delete('/nurses/delete/{id}', [NurseController::class, 'deleteNurse']);

//------------------------------------------------------------
Route::get('/vaccine/all', [VaccineController::class, 'getAll']);
Route::get('/vaccine/get/{id}', [VaccineController::class, 'getVaccineById']);
Route::post('/vaccine/add', [VaccineController::class, 'postVaccine']);

