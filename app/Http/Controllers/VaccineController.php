<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;

/**
 * Responsible Creator : Hapugala H.A.V.V (IT19974910)
 * Every vaccine method implemented in VaccineController Class
 */

class VaccineController extends Controller
{
    //
    public function getAll()
    {
        $vaccine = Vaccine::all();
        return response()->json(['results' => $vaccine], 200);
         
    }

    
    //Return a vaccine as JSON boject from vaccine table by vaccine stock no
    public function getVaccineById($id)
    {
        $vaccine = Vaccine::find($id);
        $response = [
            'vaccine' => $vaccine
        ];
        return response()->json($response, 200);
    }

    //Insert a new vaccine into the vaccine table
    public function postVaccine(Request $request)
    {
        $vaccine = new Vaccine();
        $vaccine->stockno = $request->input('stockno');
        $vaccine->name = $request->input('name');
        $vaccine->country = $request->input('country');
        $vaccine->agent = $request->input('agent');
        $vaccine->quantity = $request->input('quantity');
        $vaccine->arr_date = $request->input('arr_date');
        $vaccine->mfd = $request->input('mfd');
        $vaccine->exp = $request->input('exp');
        $vaccine->lab = $request->input('lab');
        $vaccine->lab_contact = $request->input('lab_contact');
        $vaccine->description = $request->input('description');
        $vaccine->save();
        return response()->json(['vaccine' => $vaccine, 'response' => true], 201);
    }

}
