<?php

namespace App\Http\Controllers\web\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        if (Auth::check())
        {
            if (Auth::user()->level==2) {
                return view('backend.client.pages.profile');
            }else{
                Auth::logout();
            }
        }
        else{
            return view('welcome');
        }
    }
}
