<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

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

    public function generatePDFReport()
    {
        //retreive all records from db
        // $nurses = Nurse::all();
        $nurse_by_gender = Nurse::selectRaw('`gender`, count(*) AS `cnt`')->groupBy('gender')->orderBy('cnt', 'DESC')->limit(5)->get();
        //$nurse_by_age_young = DB::select('select count(*) AS `cnt` from `nurses` where age>= 30 and age<=60');
        $nurse_by_trainee = DB::select('select count(*) AS `cnt` from `nurses` where nurse_type="Trainee"');
        $nurse_by_volunteering = DB::select('select count(*) AS `cnt` from `nurses` where nurse_type="Volunteering"');
        $nurse_by_fulltime = DB::select('select count(*) AS `cnt` from `nurses` where nurse_type="Full-time"');
        $nurse_by_senior = DB::select('select count(*) AS `cnt` from `nurses` where nurse_type="Senior_Nurse"');

        //return response()->json(['results' => $nurse_by_gender], 200);

        //share data to view
        //view()->share('nurses', $nurses);
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $nurses = Nurse::latest()->paginate(215);
        $pdf = PDF::loadView('nurse_report', [
            'nurse_by_gender' => $nurse_by_gender,
            'nurse_by_trainee' => $nurse_by_trainee,
            'nurse_by_volunteering' => $nurse_by_volunteering,
            'nurse_by_fulltime' => $nurse_by_fulltime,
            'nurse_by_senior' => $nurse_by_senior,
        ], compact('nurses'));

        //download PDF file with download method
        return $pdf->download('nurse_report.pdf');
    }

}
