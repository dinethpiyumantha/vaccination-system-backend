<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

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
    public function index()
    {
        $vaccine= Vaccine:: latest()->paginate(5);

        return view('vaccine.index',compact('vaccine'))->with(request()->input('page'));

        //table paginate
    }

       //Genarate vaccine report - PDF
       public function generatePDFReport()
       {
        $vaccine_by_agent = Vaccine::selectRaw('`agent`, count(*) AS `cnt`')->groupBy('agent')->orderBy('cnt', 'DESC')->limit(5)->get();
        $vaccine_by_smallquantity = DB::select('select count(*) AS `cnt` from `vaccines` where quantity>= 0 and quantity<=30000');
        $vaccine_by_mediumquantity = DB::select('select count(*) AS `cnt` from `vaccines` where quantity> 30000 and quantity<=100000');
        $vaccine_by_largequantity = DB::select('select count(*) AS `cnt` from `vaccines` where quantity> 100000');
        $vaccine_by_arrDate = Vaccine::orderBy('arr_date')->get()->groupBy(function($item) {
            return $item->arr_date;
        });
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
         $vaccine = Vaccine::latest()->paginate(215);
         $pdf=PDF::loadview('vaccine_report',[
            'vaccine_by_agent' => $vaccine_by_agent, 
            'vaccine_by_smallquantity' => $vaccine_by_smallquantity,
            'vaccine_by_mediumquantity' => $vaccine_by_mediumquantity,
            'vaccine_by_largequantity' => $vaccine_by_largequantity,
            'vaccine_by_arrDate' => $vaccine_by_arrDate,

         ],compact('vaccine'));
 
         //generate pdf
        return $pdf->download('vaccine_report.pdf');
       }


       public function execTest()
    {
       
        $vaccine_by_agent = Vaccine::selectRaw('`agent`, count(*) AS `cnt`')->groupBy('agent')->orderBy('cnt', 'DESC')->limit(5)->get();
        $vaccine_by_smallquantity = DB::select('select count(*) AS `cnt` from `vaccines` where quantity>= 0 and quantity<=30000');
        $vaccine_by_mediumquantity = DB::select('select count(*) AS `cnt` from `vaccines` where quantity> 30000 and quantity<=100000');
        $vaccine_by_largequantity = DB::select('select count(*) AS `cnt` from `vaccines` where quantity> 100000');
        $vaccine_by_arrDate = Vaccine::orderBy('arr_date')->get()->groupBy(function($item) {
            return $item->arr_date;
        });
        return [
  
            'vaccine_by_agent' => $vaccine_by_agent, 
            'vaccine_by_smallquantity' => $vaccine_by_smallquantity,
            'vaccine_by_mediumquantity' => $vaccine_by_mediumquantity,
            'vaccine_by_largequantity' => $vaccine_by_largequantity,
            'vaccine_by_arrDate' => $vaccine_by_arrDate,
        ];
    } 
   

    //Delete a Vaccien from vaccines table
    public function deleteVaccine($id) {
        $vaccine = Vaccine::find($id);
        if(!$vaccine) {
            return response()->json([
                "message"=>"Item not found !", 404 
            ]);
        }
        $vaccine->delete();
        return response()->json([
            "message"=>"Vaccine `$vaccine->id` Deleted !", 201
        ]);
    }


    //Update a vaccine in Vaccines table
    public function updateVaccine(Request $request, $id) {
        $vaccine = Vaccine::find($id);
        if(!$vaccine){
            return response()->json(['message'=>"Vaccine not found"],404);
        }
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
        return response()->json(['vaccine'=>$vaccine],200);
    }



}
