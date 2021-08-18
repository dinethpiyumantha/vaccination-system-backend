<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    //
    public function getAll()
    {
        $vaccine = Vaccine::all();
        return response()->json(['results' => $vaccine], 200);
         
    }
}
