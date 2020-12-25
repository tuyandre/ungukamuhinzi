<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        if (Auth::check())
        {
            if (Auth::user()->level==2) {
                return view('backend.client.dashboard');
            }else{
                Auth::logout();
            }
        }
        else{
            return view('welcome');
        }
    }
}
