<?php

namespace App\Http\Controllers\farmer;

use App\Cropfarm;
use App\Farm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
//use Tymon\JWTAuth\Facades\JWTAuth;

use JWTAuth;
class ExpenseController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
//    protected function user() {
//        return JWTAuth::parseToken()->authenticate();
//    }
    public function index(Request $request)
    {

        $farms=new farm();
        $id=$request->farmid;
        $user=$this->user
            ->cropfarms()
            ->join('users','users.id','=','cropfarms.user_id')
            ->join('farms','farms.id','=','cropfarms.farm_id')
            ->join('expenses','farms.id','=','expenses.farm_id')
            ->join('seasons','seasons.id','=','cropfarms.season_id')
            ->join('crops','crops.id','=','cropfarms.crop_id')
            ->select('expenses.farm_id','farms.id','crops.crops','farms.UPI',DB::raw('SUM(expenses.moneySpent) as total_expenses'))
            ->distinct('expenses.farm_id')
            ->groupBy('expenses.farm_id','farms.id','crops.crops','farms.UPI')
            ->where('cropfarms.status','=','1')->where('expenses.status','=','1')
            ->where('farms.id','=',$id)
            ->get();

        $count=$user->count();
        if($count>0){

            return response()->json(['Message'=>'Success','Data'=>$user,'Status'=>200,'Returned_data'=>$count]); //
        }else{
            return response()->json(['Message'=>'Success','Data'=>$user,'Status'=>200]);
        }
        //
    }
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'farm_id' => 'required|integer',
            'cropfarm_id'=>'required|integer',
            'titles'=>'required',
            'description' => 'required',
            'moneySpent' =>'required|integer'
        ]);
        if ($validator->fails()) {
            $response = [
                'Status' => 400,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $id=$request->farm_id;
        $select=DB::table('farms')->where('id',$id)->where('farms.status','0')->get();
        if($select->count()>0){
            $expense = new Expense();
            $expense->farm_id = $request->farm_id;
            $expense->cropfarm_id=$request->cropfarm_id;
            $expense->titles=$request->titles;
            $expense->description = $request->description;
            $expense->moneySpent = $request->moneySpent;

            if ($this->user->expenses()->save($expense))
                return response()->json([
                    'Message' => 'Success Expenses added',
                    'Status' =>200
                ],200);
            else
                return response()->json([
                    'message' => 'Sorry, expenses could not be added',
                    'Status' => 400,
                ], 400);
        }else{
            return response()->json([
                'Message' => 'You are not allowed to add expenses',
                'Status' =>200
            ],200);
        }
        //
    }
    public function show(Request $request)
    {
        $exp=new expense();
        $id=$request->farmid;
        $user=$this->user
            ->cropfarms()
            ->join('users','users.id','=','cropfarms.user_id')
            ->join('farms','farms.id','=','cropfarms.farm_id')
            ->join('expenses','farms.id','=','expenses.farm_id')
            ->join('seasons','seasons.id','=','cropfarms.season_id')
            ->join('crops','crops.id','=','cropfarms.crop_id')

            ->select('expenses.id','crops.crops','farms.UPI','expenses.titles','expenses.description','expenses.moneySpent','expenses.created_at','expenses.updated_at')
            ->where('farms.id','=',$id)->where('cropfarms.status','=','1')->where('expenses.status','=','1')
            ->orderBy('expenses.id')
            ->get();
        if (!$user) {
            return response()->json([
                'Status' => 400,
                'message' => 'Sorry, Expense with id ' . $id . ' cannot be found'
            ], 400);
        }
        $count=$user->count();
        if($count>0){
            return response(['Message'=>'Success','Data'=>$user,'Status'=>200,'Returned_data'=>$count]); //
        }
        else{

            return response(['Message'=>'Success','Data'=>$user,'Status'=>200]);
        }
        //
    }

    public function newCrop(Request $request){

        $validator=Validator::make($request->all(), [
            'crop_id' => 'required',
            'farm_id' => 'required',
            'season_id'=>'required',
        ]);
        if ($validator->fails()) {
            $response = [
                'Status' => 400,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $id=new farm();
        $id=$request->farm_id;
        $select=DB::table('farms')->where('farms.id','=',$id)->where('farms.status','=','1')->get();
        $count=$select->count();
        if($count>0){
            $id=DB::table('farms')->where('id','=',$id)->update(array('status'=>'0'));
            $add = new Cropfarm();
            $add->crop_id = $request->crop_id;
            $add->farm_id=$request->farm_id;
            $add->season_id=$request->season_id;
            if ($this->user->cropfarms()->save($add))
                return response()->json(['Message' =>'New crops registered','Status' => 200],200);
            else
                return response()->json([
                    'message' => 'Sorry, new crops not added',
                    'Status' => 400
                ], 400);

        }else{
            return response()->json(['Message' =>'This farms currently are used','Status' => 200],200);
        }
    }
}
