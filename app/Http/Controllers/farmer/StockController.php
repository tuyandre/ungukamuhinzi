<?php

namespace App\Http\Controllers\farmer;

use App\Farm;
use App\Http\Controllers\Controller;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
class StockController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
    public function index( Request $request)
    {
        $result=array();
        $both = array();

        $worth=array();
        $user=$this->user= JWTAuth::toUser($request->token);
        $id=$user->id;
        $stock=DB::table('stocks')
            ->join('users','stocks.user_id','=','users.id')
            ->join('cropfarms','cropfarms.id','=','stocks.cropfarm_id')
            ->join('farms','farms.id','=','cropfarms.user_id')
            ->join('seasons','seasons.id','=','cropfarms.season_id')
            ->join('crops','crops.id','=','cropfarms.crop_id')
            ->select('stocks.id as stockid','farms.id as farmid','crops.photo','stocks.cropfarm_id','crops.crops','farms.UPI','seasons.seasonLenght','stocks.quantity','stocks.price as current_price','stocks.status','stocks.created_at','stocks.updated_at')
            ->distinct('stocks.id')
            ->where('stocks.quantity','>',0)->where('stocks.user_id','=',$id)
            ->orderBy('stocks.created_at','DESC')
            ->get();
        foreach($stock as $value){
            $unpu=array();
            $publish=array();
            $worth=DB::table('stocks')
                ->select(DB::raw('SUM(stocks.quantity*stocks.price) as worth'))
                ->where('stocks.quantity','>','0')->where('stocks.user_id','=',$id)
                ->get();

            foreach($worth as $worth2){
                $worth['worth']=$worth2->worth;
            }
            $unpu=array();
            $unpu=DB::table('stocks')
                ->select(DB::raw('COUNT(stocks.status) as unpublished'))
                ->where('stocks.status','=','0')->where('stocks.quantity','>','0')->where('stocks.user_id','=',$id)
                ->get();
            foreach($unpu as $unpublished){
                $unpu['unpublished']=$unpublished->unpublished;
            }
            $publish=array();
            $publish=DB::table('stocks')
                ->select(DB::raw('COUNT(stocks.status) as published'))
                ->where('stocks.status','=','1')->where('stocks.quantity','>','0')->where('stocks.user_id','=',$id)
                ->get();
            foreach($publish as $published){
                $publish['published']=$published->published;

            }
            $res['stock_id']=$value->stockid;
            $res['farm_id']=$value->farm_id;
            $res['cropfarm_id']=$value->cropfarm_id;
            $res['crops']=$value->crops;
            $res['photo'] = $value->photo;
            $res['UPI']=$value->UPI;
            $res['price']=$value->current_price;
            $res['status']=$value->status;
            $res['quantity'] = $value->quantity;
            $res['created_at']=$value->created_at;
            $res['updated_at']=$value->updated_at;
            $result[]=$res;
        }
        if (!empty($worth)) {
            $both ["stock"] = $result;
            $both["worth"] = $worth['worth'];
            $both["unpublished"] = $unpublished->unpublished;
            $both["published"] = $published->published;
        }
        $count=$stock->count();
        if($count>0){
            return response()->json(['Message'=>'Success','Data'=>$both,'Status'=>200,'Returned_data'=>$count]); //
        }else{
            return response()->json(['Message'=>'Success','Data'=>$both,'Status'=>200,'Returned_data'=>$count]);
        }
        //
    }
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'cropfarmID' => 'required|integer',
            'quantity' => 'required',
            'price'=>'required|integer',
            'status'=>'required|integer'
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }
        $id=new farm();
        $id=$request->farm_id;
        $id2=$request->cropfarm_id;
        $select=DB::table('farms')->where('farms.id','=',$id)->where('farms.status','=','0')->get();
        $count=$select->count();
        if($count>0){
            $farms=new farm();
            $farms=DB::table('farms')->where('id','=',$id)->update(array('status'=>'1'));
            $ex=new expense;
            $ex=DB::table('expenses')->where('farm_id','=',$id)->update(array('status'=>'0'));
            $ex=DB::table('cropfarms')->where('id','=',$id2)->update(array('status'=>'0'));
            $stock = new stock();
            $stock->cropfarm_id = $request->cropfarm_id;
            $stock->quantity = $request->quantity;
            $stock->price = $request->price;
            $stock->status=$request->status;

            if ($this->user->stocks()->save($stock)){
                return response()->json(['Message' =>'Kept well in stock','Status'=>200],200);
            }
        }else{
            return response()->json(['Message' =>'You dont have harvest','Status' => 200],200);
        }
        //
    }
    public function show(Request $request)
    {
        $stk=new stock();
        $id=$request->stock_id;
        $stock=$this->user
            ->stocks()
            ->join('users','stocks.user_id','=','users.id')
            ->join('cropfarms','cropfarms.id','=','stocks.cropfarm_id')
            ->join('farms','farms.id','=','cropfarms.farm_id')
            ->join('crops','crops.id','=','cropfarms.crop_id')
            ->join('seasons','seasons.id','=','cropfarms.season_id')
            ->select('stocks.id as stockid','stocks.cropfarm_id','farms.id as farmid','crops.photo','crops.crops','farms.UPI','seasons.seasonLenght','stocks.quantity','stocks.price as current_price','stocks.status')
            ->where('stocks.id','=',$id)
            ->get();
        $count=$stock->count();
        if($count>0){
            return response(['Message'=>'Success','Data'=>$stock,'Status'=>200,'Returned_data'=>$count]); //
        }else{
            return response(['Message'=>'Success','Data'=>$stock,'Status'=>200,'Returned_data'=>$count]);
        }

        //
    }
    public function Profit(Request $request)
    {
        $result=array();
        $both=array();
        $user=$this->user= JWTAuth::toUser($request->token);
        $id=$user->id;
        $stock=DB::table('stocks')
            ->join('users','stocks.user_id','=','users.id')
            ->join('cropfarms','cropfarms.id','=','stocks.cropfarm_id')
            ->join('farms','farms.id','=','cropfarms.farm_id')
            ->join('crops','crops.id','=','cropfarms.crop_id')
            ->join('expenses','cropfarms.id','=','expenses.cropfarm_id')
            ->join('orders','orders.stock_id','=','stocks.id')
            ->select('crops.id as cropid','crops.photo','orders.quantity as quantities','stocks.price as prices','crops.crops as cropname',DB::raw('SUM(expenses.moneySpent) as total_expenses'),
                DB::raw('SUM(orders.quantity*stocks.price) as Total_amount_of_harvest'),
                DB::raw('SUM(orders.quantity*stocks.price) -SUM(expenses.moneySpent) As profit'))
            ->where('stocks.user_id','=',$id)
            ->where('expenses.status','=','0')
            ->where('orders.status','=','3')
            ->groupBy('crops.id','crops.photo','crops.crops','orders.quantity','stocks.price')
            ->get();
        foreach($stock as $value){
            $exp=array();
            $sales=array();
            $exp=DB::table('expenses')
                ->join('cropfarms','cropfarms.id','=','expenses.cropfarm_id')
                ->join('farms','farms.id','=','cropfarms.farm_id')
                ->join('stocks','stocks.cropfarm_id','=','cropfarms.id')
                ->join('orders','orders.stock_id','=','stocks.id')
                ->select(DB::raw('SUM(expenses.moneySpent) as total_expenses'))
                ->where('expenses.user_id','=',$id)->where('expenses.status','=','0')
                ->where('orders.status','=','3')
                ->get();
            foreach($exp as $expense){
                $exp=$expense->total_expenses;
            }
            $sales=DB::table('stocks')
                ->join('orders','orders.stock_id','=','stocks.id')
                ->select(DB::raw('SUM(stocks.price*orders.quantity) as sales'))
                ->where('orders.status','=','3')->where('stocks.user_id','=',$id)
                ->get();
            foreach($sales as $sales2){
                $sales=$sales2->sales;
            }
            $res['cropid']=$value->cropid;
            $res['photo']=$value->photo;
            $res['cropname']=$value->cropname;
            $res['total_expenses']=$value->total_expenses;
            $res['Total_amount_of_harvest']=$value->Total_amount_of_harvest;
            $res['profit']=$value->profit;
            $result[]=$res;
        }
        $both['crops']=$result;
        $both['expenses']=$expense->total_expenses;
        $both['sales']=$sales2->sales;
        $both['profit']=$sales2->sales-$expense->total_expenses;
        $count=$stock->count();
        if($count>0){
            return response(['Message'=>'Success','Data'=>$both,'Status'=>200,'Returned_data'=>$count]); //
        }
        else{
            return response(['Message'=>'Success','Data'=>$both,'Status'=>200,'Returned_data'=>$count]);
        }
        //
    }
    public function allProfit(){
        $expense= $this->TotalExpense();
        $total=$this->totalBenefit();
        $stock=$this->user
            ->stocks()
            ->join('cropfarms','stocks.cropfarm_id','=','cropfarms.id')
            ->join('farms','farms.id','=','cropfarms.farm_id')
            ->join('orders','orders.stock_id','stocks.id')
            ->select(DB::raw('SUM(stocks.price*orders.quantity) as Total_amount_of_harvest'))
            ->where('orders.status','=','3')
            ->get();
        $count=$stock->count();
        if($count>0){
            return response(['Message'=>'Success','Data'=>$stock,$expense,$total,'Status'=>200,'Returned_data'=>$count]);
        }
        else{
            return response(['Message'=>'Success','Data'=>$stock,'Status'=>200,'Returned_data'=>$count]);
        }
        //
    }
    public function TotalExpense(){
        $user=$this->user
            ->expenses()
            ->join('farms','farms.id','=','expenses.farm_id')
            ->join('cropfarms','farms.id','=','cropfarms.farm_id')
            ->join('stocks','stocks.cropfarm_id','=','cropfarms.id')
            ->select(DB::raw('SUM(expenses.moneySpent) as total_expenses'))
            ->get();
        $count=$user->count();
        if($count>0){

            return response()->json(['Message'=>'Success','Data'=>$user,'Status'=>200,'Returned_data'=>$count]); //
        }else{
            return response()->json(['Message'=>'Success','Data'=>$user,'Status'=>200,'Returned_data'=>$count]);
        }
    }
    public function totalBenefit(){
        $total=DB::table('stocks')
            ->join('users','stocks.user_id','=','users.id')
            ->join('expenses','expenses.user_id','=','users.id')
            ->select(DB::raw('SUM(stocks.price*stocks.quantity)-SUM(expenses.moneySpent) as profit'))
            ->groupBy('expenses.moneySpent','stocks.price','stocks.quantity')
            ->get();
        $count=$total->count();
        if($count>0){
            return response()->json(['Message'=>'Success','Data'=>$total,'Status'=>200,'Returned_data'=>$count]); //
        }
        else{
            return response()->json(['Message'=>'Success','Data'=>$total,'Status'=>200,'Returned_data'=>$count]);
        }
    }
    public function update(Request $request)
    {
        $stk=new stock();
        $id=$request->stocid;
        $stock = $this->user->stocks()->find($id);
        if (!$stock) {
            return response()->json([
                'Status' => 400,
                'message' => 'Sorry, stock with id ' . $id . ' cannot be found'
            ], 400);
        }
        $stock->cropfarm_id = $request->cropfarm_id;
        $stock->quantity = $request->quantity;
        $stock->price=$request->price;
        $stock->status = $request->status;
        $stock->save();
        return response()->json(['Message' =>'stock Updated','Status' => 200],200);

        //
    }
    public function publish(Request $request){
        $stk=new stock();
        $id=$request->stocid;
        $status=$request->status;
        $publish= DB::table('stocks')->where('stocks.id','=',$id)->update(array('stocks.status'=>$status));
        if($status==0){
            return response()->json(['Message' =>'Harvest upublished well','Status'=>200],200);
        }else{
            return response()->json(['Message' =>'Haverst published well','Status'=>200],200);
        }
    }
    public function feeds(){
        $stock=$this->user
            ->stocks()
            ->join('cropfarms','cropfarms.id','=','stocks.cropfarm_id')
            ->join('crops','crops.id','=','cropfarms.crop_id')
            ->join('farms','farms.id','=','cropfarms.farm_id')
            ->select('crops.id as cropid','crops.crops as cropname','crops.photo')
            ->groupBy('crops.id','crops.crops','crops.photo')
            ->get();
        $count=$stock->count();
        if($count>0){
            return response()->json(['Message'=>'Success','Data'=>$stock,'Returned_Data'=>$count,'Status'=>200]);
        }
        else{
            return response()->json(['Message'=>'Success','Data'=>$stock,'Returned_Data'=>$count,'Status'=>200]);
        }
    }
}
