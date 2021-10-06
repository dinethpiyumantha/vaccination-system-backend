<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    
    //Return all admins as JSON from admins table
    public function getAll()
    {
        $admin = Admin::all();
        return response()->json(['results' => $admin], 200);
    }

    //Return a admin as JSON boject from admins table by searialno
    public function getAdminById($id)
    {
        $admin = Admin::find($id);
        $response = [
            'admin' => $admin
        ];
        return response()->json($response, 200);
    }

    //Insert a admin into admins table
    public function postAdmin(Request $request)
    {
        $admin = new Admin();
        $admin->userId = $request->input('userId');
        $admin->name = $request->input('name');
        $admin->nic = $request->input('nic');
        $admin->gender = $request->input('gender');
        $admin->age = $request->input('age');
        $admin->phone = $request->input('phone');
        $admin->role = $request->input('role');
        $admin->pwd1 = $request->input('pwd1');
        $admin->pwd2 = $request->input('pwd2');
        $admin->save();
        return response()->json(['admin' => $admin, 'response' => true], 201);
    }

    public function loginValidator(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        $response = DB::select("SELECT * FROM admins WHERE userId='".$username."' AND pwd1='".$password."'");

        return response()->json($response, 200);
    }
}
