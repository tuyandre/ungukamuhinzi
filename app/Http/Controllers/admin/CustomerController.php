<?php

namespace App\Http\Controllers\admin;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(){
        if (Auth::check()){
            return view('backend.admin.customers.allCustomers');
        }else{
            return view('welcome');
        }
    }
    public function allCustomers(){
        $customers=new customer();
        $customers=DB::table('customers')
            ->leftjoin('users','users.id','=','customers.user_id')
            ->select('users.id','customers.photo','customers.fname','customers.lname','customers.phone','customers.identity','users.status','customers.created_at','customers.updated_at')
            ->where('users.status','=','1')
            //->orwhere('users.status','2')
            ->get();
        $count=$customers->count();
        if($count>0){
            return response()->json(['message'=>'Success','customers'=>$customers,'Status'=>200,'Data_returned'=>$count]);
        }
        else{
            return response()->json(['message'=>'Success','customers'=>$customers,'Status'=>200,'Data_returned'=>$count]);
        }

    }
    public function suspendedCustomerPage(){
        if (Auth::check()){
            return view('backend.admin.customers.suspendedCustomers');
        }else{
            return view('welcome');
        }
    }
    public function activeCustomerPage(){
        if (Auth::check()){
            return view('backend.admin.customers.activeCustomers');
        }else{
            return view('welcome');
        }
    }
}
