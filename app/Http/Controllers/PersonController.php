<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //
    public function getAll() {
        $people = Person::all();
        return response()->json(['results'=>$people],200);
    }
}
