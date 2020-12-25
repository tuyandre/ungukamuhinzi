<?php

namespace App\Http\Controllers\admin;

use App\Customer;
use App\Farmer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FarmerController extends Controller
{
    public function index(){
        if (Auth::check()){
            return view('backend.admin.farmers.allFarmers');
        }else{
            return view('welcome');
        }
    }
    public function allFarmer(){
        $farmers=new Farmer();
        $farmers=DB::table('farmers')
            ->leftjoin('users','users.id','=','farmers.user_id')
            ->select('users.id','farmers.photo','farmers.fname','farmers.lname','farmers.phone','farmers.identity','users.status','farmers.created_at','farmers.updated_at')
            ->where('users.status','=','1')
            //->orwhere('users.status','2')
            ->get();
        $count=$farmers->count();
        if($count>0){
            return response()->json(['message'=>'Success','farmers'=>$farmers,'Status'=>200,'Data_returned'=>$count]);
        }
        else{
            return response()->json(['message'=>'Success','farmers'=>$farmers,'Status'=>200,'Data_returned'=>$count]);
        }

    }
}
