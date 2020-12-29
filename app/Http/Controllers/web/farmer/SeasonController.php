<?php

namespace App\Http\Controllers\web\farmer;

use App\Http\Controllers\Controller;
use App\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        $season=season::all();
        $count=$season->count();
        if($count>0){
            return response()->json(['Message'=>'Success','Data'=>$season,'Status'=>200,'Returned_data'=>$count]); //
        }else{
            return response()->json(['Message'=>'Success','Data'=>$season,'Status'=>200]);
        }
        //
    }
}
