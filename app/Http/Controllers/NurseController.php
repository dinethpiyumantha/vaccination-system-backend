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

}
