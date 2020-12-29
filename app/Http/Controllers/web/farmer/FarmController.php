<?php

namespace App\Http\Controllers\web\farmer;

use App\Farm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class FarmController extends Controller
{
    public function index(Request $request)
    {
        $user=Auth::user();
        $result = array();

        $userid=$user->id;
        $farm = Farm::where('user_id',$userid)->get();

        foreach($farm as $farms){
            $farmid = $farms->id;
            $farmcrop =array();
            $frm =array();
            //$farmcrops = Cropfarm::where('farmID',$farmid)->get();
            $farmcrops=DB::table('cropfarms')
                ->leftjoin('farms','farms.id','=','cropfarms.id')
                ->leftjoin('crops','crops.id','=','cropfarms.crop_id')
                ->select('farms.id as farm_id','cropfarms.id as cropfarm_id','crops.photo','crops.crops as cropname','farms.status','farms.UPI','farms.location','farms.user_id','farms.plotsize','farms.created_at','farms.updated_at')
                ->where('farm_id',$farmid)->where('cropfarms.status','=','1')
                ->get();
            foreach($farmcrops as $frmcrop){
                $farmcrop['cropfarmID']=$frmcrop->cropfarm_id;
                $farmcrop['cropimage'] = $frmcrop->photo;
                $farmcrop['cropname'] = $frmcrop->cropname;

                //return $farmcrops;
            }
            $frm['farmID']=$farms->id;
            $frm['UPI']=$farms->UPI;
            $frm['location'] = $farms->location;
            $frm['plotsize']=$farms->plotsize;
            $frm['Status'] = $farms->status;
            $frm['farmcrop']=$farmcrop;
            $result[]=$frm;
        }
        $count= $farm->count();
        if($count>0){
            return response()->json(['Message'=>'Success','Data'=>$result,'Status'=>200,'Returned_data'=>$count]); //
        } else{
            return response()->json(['Message'=>'Success','Data'=>$result,'Status'=>200,'Returned_data'=>$count]);
        }
        //
    }
    public function store(Request $request)
    {

        $validator=Validator::make($request->all(), [
            'UPI' => 'unique:farms',
            'location' => 'required',
            'plotsize'=>'required',
        ]);
        if ($validator->fails()) {
            $response = [
                'Status' => 400,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $user=Auth::user();
        if ($user) {
            $userid = $user->id;
            $farmers = DB::table('farmers')->select('user_id')->where('user_id', '=', $userid)->get()->count();
            if ($farmers > 0) {
                $farms = new Farm();
                $farms->UPI = $request->UPI;
                $farms->location = $request->location;
                $farms->plotsize = $request->plotsize;
                if ($this->user->farms()->save($farms))
                    return response()->json(['Message' => 'Farm Registered', 'farm' => $farms], 200);
                else
                    return response()->json([
                        'Message' => 'Sorry, new farm not added',
                        'Status' => 400,
                    ], 400);
            } else {
                return response()->json(['Message' => 'Before you register your farms complete your profile', 'Status' => 200], 200);
            }
        }else{
            return response()->json(['Message' => 'Please login', 'Status' => 200], 200);
        }
        //
    }
}
