<?php

namespace App\Http\Controllers;

use App\Models\DeletedPerson;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PersonController extends Controller
{
     /**
     * Return all persons as JSON from people table
     * @return json 
     */
    public function getAll()
    {
        $people = Person::all();
        return response()->json(['results' => $people], 200);
    }


    /**
     * Return a person from people table by id
     * @param string $id person id
     * @return json 
     */
    public function getPersonById($id)
    {
        $person = Person::find($id);
        $response = [
            'person' => $person
        ];
        return response()->json($response, 200);
    }


    /**
     * Insert a person into people table
     * @param Request $request get http request with json object
     * @return json 
     */
    public function postPerson(Request $request)
    {
        $person = new Person();
        $person->serialno = $request->input('serialno');
        $person->name = $request->input('name');
        $person->nic = $request->input('nic');
        $person->age = $request->input('age');
        $person->gender = $request->input('gender');
        $person->address = $request->input('address');
        $person->phone = $request->input('phone');
        $person->district = $request->input('district');
        $person->moh = $request->input('moh');
        $person->gn = $request->input('gn');
        $person->important = $request->input('important');
        $person->save();
        return response()->json(['person' => $person, 'response' => true], 201);
    }


    /**
     * Update a person in people table
     * @param Request $request get http request with json object
     * @param string $id person id
     * @return json 
     */
    public function updatePerson(Request $request, $id)
    {
        $person = Person::find($id);
        if (!$person) {
            return response()->json(['message' => "Person not found"], 404);
        }
        $person->serialno = $request->input('serialno');
        $person->name = $request->input('name');
        $person->nic = $request->input('nic');
        $person->age = $request->input('age');
        $person->gender = $request->input('gender');
        $person->address = $request->input('address');
        $person->phone = $request->input('phone');
        $person->district = $request->input('district');
        $person->moh = $request->input('moh');
        $person->gn = $request->input('gn');
        $person->important = $request->input('important');
        $person->save();
        return response()->json(['person' => $person], 200);
    }


    /**
     * Update a person in people table
     * @param Request $request get http request with json object
     * @param string $id person id
     * @return json 
     */
    public function deletePerson($id)
    {
        $person = Person::find($id);
        if (!$person) {
            return response()->json([
                "message" => "Person not found !", 404
            ]);
        }
        $ret = DeletedPersonController::insertDeletedPerson($person);
        $person->delete();
        return response()->json([
            "message" => "Person `$person->id` deleted ! result=`$ret`", 201
        ]);
    }


    /**
     * Genarate person report - PDF
     * @return PDF 
     */
    public function generatePDFReport()
    {
        $person_by_gender = Person::selectRaw('`gender`, count(*) AS `cnt`')->groupBy('gender')->orderBy('cnt', 'DESC')->limit(5)->get();
        $person_by_age_child = DB::select('select count(*) AS `cnt` from `people` where age>= 0 and age<=14');
        $person_by_age_youth = DB::select('select count(*) AS `cnt` from `people` where age>= 15 and age<=24');
        $person_by_age_adult = DB::select('select count(*) AS `cnt` from `people` where age>= 25 and age<=64');
        $person_by_age_senior = DB::select('select count(*) AS `cnt` from `people` where age>= 65');
        $person_dates = Person::orderBy('created_at')->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        });
        $deleted_person_dates = DeletedPerson::orderBy('created_at')->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        });
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('person_report', [
            'person_by_gender' => $person_by_gender, 
            'person_by_age_child' => $person_by_age_child,
            'person_by_age_youth' => $person_by_age_youth,
            'person_by_age_adult' => $person_by_age_adult,
            'person_by_age_senior' => $person_by_age_senior,
            'person_dates' => $person_dates,
            'deleted_person_dates' => $deleted_person_dates,
        ]);
        return $pdf->download('person_report.pdf');
    }


    /**
     * Genarate person report - HTML
     * @return view 
     */
    public function generateHTMLReport()
    {
        $person_by_gender = Person::selectRaw('`gender`, count(*) AS `cnt`')->groupBy('gender')->orderBy('cnt', 'DESC')->limit(5)->get();
        $person_by_age_child = DB::select('select count(*) AS `cnt` from `people` where age>= 0 and age<=14');
        $person_by_age_youth = DB::select('select count(*) AS `cnt` from `people` where age>= 15 and age<=24');
        $person_by_age_adult = DB::select('select count(*) AS `cnt` from `people` where age>= 25 and age<=64');
        $person_by_age_senior = DB::select('select count(*) AS `cnt` from `people` where age>= 65');
        $person_dates = Person::orderBy('created_at')->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        });
        $deleted_person_dates = DeletedPerson::orderBy('created_at')->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        });
        return view('person_report', [
            'person_by_gender' => $person_by_gender, 
            'person_by_age_child' => $person_by_age_child,
            'person_by_age_youth' => $person_by_age_youth,
            'person_by_age_adult' => $person_by_age_adult,
            'person_by_age_senior' => $person_by_age_senior,
            'person_dates' => $person_dates,
            'deleted_person_dates' => $deleted_person_dates,
        ]);
    }


    /**
     * Get count of person table records
     * @return integer 
     */
    public function getCount()
    {
        return Person::get()->count();
    }
    
}
