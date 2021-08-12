<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

/**
 * Author : EKANAYAKA GMDP (IT19955650)
 * all person methods implemented in PersonController class
 */
class PersonController extends Controller
{
    //Return all persons as JSON from people table
    public function getAll() {
        $people = Person::all();
        return response()->json(['results'=>$people],200);
    }

    //Return a person as JSON boject from people table by searialno
    public function getPersonById($id) {
        $person = Person::find($id);
        $response = [
            'person'=>$person
        ];
        return response()->json($response,200);
    }

    //Insert a person into people table
    public function postPerson(Request $request) {
        $person = new Person();
        $person->serialno = $request->input('serialno');
        $person->name = $request->input('name');
        $person->nic = $request->input('nic');
        $person->age = $request->input('age');
        $person->gender = $request->input('gender');
        $person->address = $request->input('address');
        $person->save();
        return response()->json(['person'=>$person, 'response'=>true], 201);
    }

    //Update a person in people table
    public function updatePerson(Request $request, $id) {
        $person = Person::find($id);
        if(!$person){
            return response()->json(['message'=>"Person not found"],404);
        }
        $person->serialno = $request->input('serialno');
        $person->name = $request->input('name');
        $person->nic = $request->input('nic');
        $person->age = $request->input('age');
        $person->gender = $request->input('gender');
        $person->address = $request->input('address');
        $person->save();
        return response()->json(['person'=>$person],200);
    }

    //Delete a person from people table
    public function deletePerson($id) {
        $person = Person::find($id);
        if(!$person) {
            return response()->json([
                "message"=>"Item not found !", 404 
            ]);
        }
        $person->delete();
        return response()->json([
            "message"=>"Person `$person->id` Deleted !", 201
        ]);
    }
}
