<?php

namespace App\Http\Controllers\farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        if (Auth::check())
        {
            if (Auth::user()->level==1) {
                return view('backend.farmer.dashboard');
            }else{
                Auth::logout();
            }
        }
        else{
            return view('welcome');
        }
    }
}
