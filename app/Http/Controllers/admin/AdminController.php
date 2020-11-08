<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function loginUser(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',

        ]);
        if ($validator->fails()) {
            $response = [
                'Status' => 400,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        if(is_numeric($request->get('email'))){
            if(Auth::attempt(['phone' => $request->email, 'password' => $request->password])){

                if(Auth::user()->status==1){
                    $user=Auth::user();
                    $user['message']="Sussecc";
                    return response()->json($user);
                }else{
                    Auth::logout();
                    return response()->json(['Message'=>'Your acount blocked','Status'=>401],401);
                }


            }else{
                return response()->json([
                    'message' => 'Invalid Credential',
                    'Status' => 401,
                ], 401);
            }
        }else{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

                if(Auth::user()->status==1){
                    $user=Auth::user();
                    $user['message']="Sussecc";
                    return response()->json($user);
                }else{
                    Auth::logout();
                    return response()->json(['Message'=>'Your acount blocked','Status'=>401],401);
                }


            }else{
                return response()->json([
                    'message' => 'Invalid Credential',
                    'Status' => 401,
                ], 401);
            }

        }



        return back()->withInput($request->only('email', 'remember'));
    }
}
