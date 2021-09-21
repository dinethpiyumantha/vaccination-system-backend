<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function getAll()
    {
        /**
         * Get all doctors and return as json objects
         */
        $appointments = Appointment::all();
        return response()->json(['results' => $appointments], 200);
    }
    

    public function getAppointmentById($id)
    {
        $appointment = Appointment::find($id);
        $response = [
            'appointment' => $appointment
        ];
        return response()->json($response, 200);
    }


    public function postAppointment(Request $request)
    {
        $appointment = new Appointment();
        $appointment->nameFull = $request->input('nameFull');
        $appointment->slmcNo = $request->input('slmcNo');
        $appointment->hospital = $request->input('hospital');
        $appointment->phoneNo = $request->input('phoneNo');
        $appointment->Appointeddate = $request->input('Appointeddate');
        $appointment->venue = $request->input('venue');
        $appointment->reason = $request->input('reason');
        $appointment->save();
        return response()->json(['appointment' => $appointment, 'response' => true], 201);
    }

    public function updateAppointment(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        if (!$appointment) {
            return response()->json(['message' => "Appointment not found"], 404);
        }
        $appointment->nameFull = $request->input('nameFull');
        $appointment->slmcNo = $request->input('slmcNo');
        $appointment->hospital = $request->input('hospital');
        $appointment->phoneNo = $request->input('phoneNo');
        $appointment->Appointeddate = $request->input('Appointeddate');
        $appointment->venue = $request->input('venue');
        $appointment->reason = $request->input('reason');
        $appointment->save();
        return response()->json(['appointment' => $appointment], 200);
    }

    public function deleteAppointment($id)
    {
        $appointment = Appointment::find($id);
        if (!$appointment) {
            return response()->json([
                "message" => "Appointment not found !", 404
            ]);
        }
        $appointment->delete();
        return response()->json([
            "message"=>"Appointment Deleted !", 201
        ]);
    }
}
