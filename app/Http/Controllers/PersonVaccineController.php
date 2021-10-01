<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\PersonVaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonVaccineController extends Controller
{
    //
    public function getAll()
    {
        $person = DB::table('people')
        ->select('*')
        ->join('person_vaccines','person_vaccines.person_id','=','people.id')
        ->get();

        $response = [
            'person' => $person
        ];
        return response()->json($response, 200);
    }

    public function getByNIC($nic)
    {
        $person = DB::table('people')->select('*')->where('nic', '=', $nic)->get();
        $temp = null;
        foreach ($person as $p) {
            $temp = $p;
        }
        $vaccine = DB::table('person_vaccines')->select('*')->where('person_id', '=', $temp->id)->get();
        return response()->json([
            'person' => $person,
            'vaccine' => $vaccine
        ], 200);
    }
}
