<?php

namespace App\Http\Controllers;

use App\Models\DeletedPerson;
use App\Models\Person;
use Illuminate\Http\Request;

class DeletedPersonController extends Controller
{

    /**
     * Return all persons as JSON from people table
     * @return json 
     */
    public function getAll()
    {
        $people = DeletedPerson::all();
        return response()->json(['results' => $people], 200);
    }

    /**
     * Insert a deleted person into people table
     * @param Person $person_req get http request with json object
     * @return boolean 
     */
    public static function insertDeletedPerson(Person $person_req)
    {
        $person = new DeletedPerson();
        $person->serialno = $person_req->serialno;
        $person->name = $person_req->name;
        $person->nic = $person_req->nic;
        $person->age = $person_req->age;
        $person->gender = $person_req->gender;
        $person->address = $person_req->address;
        $person->phone = $person_req->phone;
        $person->district = $person_req->district;
        $person->moh = $person_req->moh;
        $person->gn = $person_req->gn;
        $person->important = $person_req->important;
        return $person->save();
    }
}
