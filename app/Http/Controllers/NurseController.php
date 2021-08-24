<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    /*return all nurse data from the DB table in JSON format*/
    public function getAll()
    {
        $nurses = Nurse::all();
        return response()->json(['results' => $nurses], 200);
    }

    //insert function
    public function addNurse(Request $request)
    {
        $nurse = new Nurse(); //new nurse object
        $nurse->nurse_no = $request-> input('nurse_no');
        $nurse->name = $request-> input('name');
        $nurse->joined_date = $request-> input('joined_date');
        $nurse->NIC = $request-> input('NIC');
        $nurse->age = $request-> input('age');
        $nurse->gender = $request-> input('gender');
        $nurse->phone_no = $request-> input('phone_no');
        $nurse->email = $request-> input('email');
        $nurse->nurse_type = $request-> input('nurse_type');
        $nurse->working_hospital = $request-> input('working_hospital');
        $nurse->permanent_address = $request-> input('permanent_address');
        $nurse->Shift = $request-> input('Shift');
        $nurse->From = $request-> input('From');
        $nurse->To = $request-> input('To');
        $nurse->specialNote = $request-> input('specialNote');

        $nurse-> save();
        return response()->json(['nurse' => $nurse, 'response' => true], 201);
    }

    //retrieve form data of a single nurse
    public function getNurseByID($id){

        $nurse = Nurse::find($id);
        $response = [
            'nurse' => $nurse
        ];
        return response()->json($response, 200);
    }

    //update function
    public function updateNurse(Request $request, $id){

        $nurse = Nurse:: find($id);

        $nurse->nurse_no = $request-> input('nurse_no');
        $nurse->name = $request-> input('name');
        $nurse->joined_date = $request-> input('joined_date');
        $nurse->NIC = $request-> input('NIC');
        $nurse->age = $request-> input('age');
        $nurse->gender = $request-> input('gender');
        $nurse->phone_no = $request-> input('phone_no');
        $nurse->email = $request-> input('email');
        $nurse->nurse_type = $request-> input('nurse_type');
        $nurse->working_hospital = $request-> input('working_hospital');
        $nurse->permanent_address = $request-> input('permanent_address');
        $nurse->Shift = $request-> input('Shift');
        $nurse->From = $request-> input('From');
        $nurse->To = $request-> input('To');
        $nurse->specialNote = $request-> input('specialNote');

        $nurse-> save();
        return response()->json(['nurse' => $nurse], 200);
    }

    //delete nurse function
    public function deleteNurse($id){

        $nurse = Nurse::find($id);
        if($nurse){

            $nurse -> delete();
            return response()->json([
                "message" => "Nurse '$nurse->id' was deleted!", 201
            ]);
        }else{
            return response()->json([
                "message" => "Nurse not found!", 404
            ]);
        }
    }

}
