<?php

namespace App\Http\Controllers\web\farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmerController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            if (Auth::user()->level == 1) {
                $user = Auth::user();
                $userid = $user->id;
                $farmers = $user
                    ->farmers()
                    ->get(['id', 'photo', 'fname', 'lname', 'phone', 'identity', 'created_at', 'updated_at'])
                    ->toArray();
                if (!$farmers) {
                    return response()->json([
                        'Status' => 400,
                        'message' => 'Sorry, farmer with id ' . $userid . ' cannot be found'
                    ], 400);
                }

                return response()->json(['Message' => 'Success', 'Data' => $farmers, 'Status' => 200], 200);
                //

            } else {
                Auth::logout();
            }
        } else {
            return view('welcome');
        }
    }
}
