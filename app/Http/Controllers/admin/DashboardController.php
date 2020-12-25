<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function dashboard(){
       if (Auth::check())
           if (Auth::user()->level==3) {
               return view('backend.admin.dashboard');
           }else{
               Auth::logout();
           }
       else{
           return view('welcome');
       }
   }
}
