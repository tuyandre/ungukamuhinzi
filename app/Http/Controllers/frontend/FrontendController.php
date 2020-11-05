<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getLoginPage(){
        return view('frontend.auth.login');
    }
    public function getRegisterPage(){
        return view('frontend.auth.register');
    }
    public function getAdminRegisterPage(){
        return view('frontend.auth.adminRegister');
    }
}
