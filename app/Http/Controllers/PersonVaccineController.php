<?php

namespace App\Http\Controllers;

use App\Models\PersonVaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonVaccineController extends Controller
{
    //
    public function getById($nic)
    {
        $person = PersonVaccine::orderBy('created_at')->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        });
        $response = [
            'person' => $person
        ];
        return response()->json($response, 200);
    }
}
