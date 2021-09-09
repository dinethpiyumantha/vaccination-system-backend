<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use Illuminate\Http\Request;

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
}
