<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function registerUser(Request $request){
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'phone' => 'required|max:10|min:10|unique:users',
            'password' => 'required',
            'level' => 'required',
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

        $user  = User::create([
            'fullname'=>$request->fullname,
            'phone'=>$request->phone,
            'status'=>1,
            'password'=>Hash::make($request->password),
            'level'=>$request->level
        ]);
        return response()->json([
            'Message'=>'Success',
            'Data' => $user,
            'Status' => 200

        ], 200);
    }
}
