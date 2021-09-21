<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class DoctorController extends Controller
{
    public function getAll()
    {
        /**
         * Get all doctors and return as json objects
         */
        $doctors = Doctor::all();
        return response()->json(['results' => $doctors], 200);
    }
    

    public function getDoctorById($id)
    {
        $doctor = Doctor::find($id);
        $response = [
            'doctor' => $doctor
        ];
        return response()->json($response, 200);
    }


    public function postDoctor(Request $request)
    {
        $doctor = new Doctor();
        $doctor->nameFull = $request->input('nameFull');
        $doctor->slmcNo = $request->input('slmcNo');
        $doctor->hospital = $request->input('hospital');
        $doctor->address = $request->input('address');
        $doctor->gender = $request->input('gender');
        $doctor->phoneNo = $request->input('phoneNo');
        $doctor->maritalStatus = $request->input('maritalStatus');
        $doctor->date = $request->input('date');
        $doctor->venue = $request->input('venue');
        $doctor->save();
        return response()->json(['doctor' => $doctor, 'response' => true], 201);
    }

    public function updateDoctor(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            return response()->json(['message' => "Doctor not found"], 404);
        }
        $doctor->nameFull = $request->input('nameFull');
        $doctor->slmcNo = $request->input('slmcNo');
        $doctor->hospital = $request->input('hospital');
        $doctor->address = $request->input('address');
        $doctor->gender = $request->input('gender');
        $doctor->phoneNo = $request->input('phoneNo');
        $doctor->maritalStatus = $request->input('maritalStatus');
        $doctor->date = $request->input('date');
        $doctor->venue = $request->input('venue');
        $doctor->save();
        return response()->json(['doctor' => $doctor], 200);
    }

    public function deleteDoctor($id)
    {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            return response()->json([
                "message" => "Doctor not found !", 404
            ]);
        }
        $doctor->delete();
        return response()->json([
            "message"=>"Doctor Deleted !", 201
        ]);
    }

    /**
     * Genarate person report - PDF
     * @return PDF 
     */
    public function generatePDFReport()
    {
        $doctor_by_hospital = Doctor::selectRaw('`hospital`, count(*) AS `cnt`')->groupBy('hospital')->orderBy('cnt', 'DESC')->limit(5)->get();
        $doctor_by_gender = Doctor::selectRaw('`gender`, count(*) AS `cnt`')->groupBy('gender')->orderBy('cnt', 'DESC')->limit(5)->get();
        $doctor_by_venue = Doctor::selectRaw('`venue`, count(*) AS `cnt`')->groupBy('venue')->orderBy('cnt', 'DESC')->limit(5)->get();
        $doctor_dates = Doctor::orderBy('created_at')->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        });
        $appointment_doctor_dates = Appointment::orderBy('created_at')->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        });
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('doctor_report', [ 
            'doctor_by_hospital' => $doctor_by_hospital,
            'doctor_by_gender' => $doctor_by_gender,
            'doctor_by_venue' => $doctor_by_venue,
            'doctor_dates' => $doctor_dates,
            'appointment_doctor_dates' => $appointment_doctor_dates,
        ]);
        return $pdf->download('doctor_report.pdf');
    }


    /**
     * Genarate person report - HTML
     * @return view 
     */
    public function generateHTMLReport()
    {
        $doctor_by_hospital = Doctor::selectRaw('`hospital`, count(*) AS `cnt`')->groupBy('hospital')->orderBy('cnt', 'DESC')->limit(5)->get();
        $doctor_by_gender = Doctor::selectRaw('`gender`, count(*) AS `cnt`')->groupBy('gender')->orderBy('cnt', 'DESC')->limit(5)->get();
        $doctor_by_venue = Doctor::selectRaw('`venue`, count(*) AS `cnt`')->groupBy('venue')->orderBy('cnt', 'DESC')->limit(5)->get();
        $doctor_dates = Doctor::orderBy('created_at')->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        });
        $appointment_doctor_dates = Appointment::orderBy('created_at')->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        });
        return view('doctor_report', [
            'doctor_by_hospital' => $doctor_by_hospital,
            'doctor_by_gender' => $doctor_by_gender,
            'doctor_by_venue' => $doctor_by_venue,
            'doctor_dates' => $doctor_dates,
            'appointment_doctor_dates' => $appointment_doctor_dates,
        ]);
    }


    /**
     * Get count of person table records
     * @return integer 
     */
    public function getCount()
    {
        return Doctor::get()->count();
    }
}
