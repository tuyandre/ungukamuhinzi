<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function registerAdmin(Request $request){

        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'phone' => 'required|max:10|min:10|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',

        ]);
        if ($validator->fails()) {
            $response = [
                'Status' => 400,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $user= User::create([
            'fullname' => $request['fullname'],
            'email' => $request['email'],
            'level' => 3,
            'status' => 1,
            'phone' => $request['phone'],
            'password' => Hash::make($request['password']),
        ]);
        return response()->json([
            'Message'=>'Success',
            'Data' => $user,
            'Status' => 200

        ], 200);
    }
}
