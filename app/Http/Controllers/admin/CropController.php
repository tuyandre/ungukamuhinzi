<?php

namespace App\Http\Controllers\admin;

use App\Crop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CropController extends Controller
{
    public function index()
    {
        if (Auth::check())
            if (Auth::user()->level == 3) {
                return view('backend.admin.crops.allCrops');
            } else {
                Auth::logout();
            }
        else {
            return view('welcome');
        }
    }
    public function allCrops(){
        $crop=Crop::all();
        return response()->json(['crops' => $crop], 200); //
    }
}
