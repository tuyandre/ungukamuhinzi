<?php

namespace App\Http\Controllers\farmer;

use App\Crop;
use App\Farm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
//use JWTAuth;
use Tymon\JWTAuth\Facades\JWTAuth;

class FarmController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
    public function index(Request $request)
    {
        $result = array();
//        $user=$this->user = JWTAuth::parseToken()->authenticate();
        $user=$this->user = JWTAuth::toUser($request->token);
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
            return response()->json(['data'=>$result],200); //
        } else{
            return response()->json(['data'=>$result],200);
        }
        //
    }
    public function store(Request $request)
    {

        $validator=Validator::make($request->all(), [
            'UPI' => 'unique:farms',
            'location' => 'required',
            'token' => 'required',
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
        $user=$this->user = JWTAuth::toUser($request->token);
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
    public function show(Request $request)
    {

        $result = array();
        $id=$request->farmid;
        $farm = Farm::where('id',$id)->get();

        foreach($farm as $farms){
            $farmid = $farms->id;
            $farmcrop =array();
            $frm =array();
            //$farmcrops = Cropfarm::where('farm_id',$farmid)->get();
            $farmcrops=DB::table('cropfarms')
                ->leftjoin('farms','farms.id','=','cropfarms.farm_id')
                ->leftjoin('seasons','seasons.id','=','cropfarms.season_id')
                ->leftjoin('crops','crops.id','=','cropfarms.crop_id')
                ->select('farms.id as farm_id','cropfarms.id as cropfarm_id','seasons.seasonLenght','crops.photo','crops.crops as cropname','farms.status','farms.UPI','farms.location','farms.user_id','farms.plotsize','farms.created_at','farms.updated_at')
                ->where('farm_id',$farmid)->where('cropfarms.status','=','1')
                ->get();
            foreach($farmcrops as $frmcrop){
                $farmcrop['cropfarmID']=$frmcrop->cropfarm_id;
                $farmcrop['cropimage'] = $frmcrop->photo;
                $farmcrop['cropname'] = $frmcrop->cropname;
                $farmcrop['seasons']=$frmcrop->seasonLenght;

                //return $farmcrops;
            }
            $frm['farm_id']=$farms->id;
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
    public function update(Request $request)
    {
        $id=$this->user = JWTAuth::toUser($request->token);
        $userid=$id->id;
        $farmid=new Farm();
        $id=$request->farmid;
//        $farms = $this->user->farms()->find($id);
        $farms = $this->user->farms()->find($id);
        if (!$farms) {
            return response()->json([
                'Status' => 400,
                'message' => 'Sorry, farm with id ' . $id . ' cannot be found'
            ], 400);
        }

        $farms->UPI = $request->UPI;
        $farms->location = $request->location;
        $farms->plotsize=$request->plotsize;
        $farms->save();
        return response()->json(['Message' =>'farms Updated','Status'=>200],200);
        //
    }
    public function updateCrops(Request $request){

        $validator = Validator::make($request->all(), [
            'cropid' => 'required|integer',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $id = $request->get('cropid');
        $validfarmer = Crop::where('id','=',$id)->count();
        if ($validfarmer == 0) {
            $retunerror = array('Message'=>'this crops is currently unvailable','status'=>400);
            return response()->json($retunerror);
        }
        else{

            $imageurls = array();
            $existedrecords =Crop::where('id','=',$request->get('cropid'))->get();

            if($request->hasFile('photo')){
                $image = $request->file('photo');
                $name = $request->file('photo')->getClientOriginalName();
                $image_name = $request->file('photo')->getRealPath();
                Cloudder::upload($image_name, null);
                list($width, $height) = getimagesize($image_name);
                $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
                //save to uploads directory
                $image->move(public_path("public/images"), $name);
            }
            else{
                foreach($existedrecords as $existss){
                    $imageurls[] = $existss->photo;
                }
                $image_url = implode("",$imageurls);
            }

            $crops =crop::find($id);
            if (!$crops) {
                return response()->json([

                    'message' => 'Sorry, crops with id ' . $id . ' cannot be found',
                    'Status' => 400
                ], 400);
            }

            $crops->photo = $image_url;
            $crops->crops=$request->crops;
            $crops->save();
            return response()->json(['Message' =>'crops Updated','Status'=>200],200);

        }
    }
    public function farmsUsed(Request $request){
        $result=array();
        $both=array();

        $exp=array();
        $id=$request->cropid;
        $farms=$this->user
            ->farms()
            ->join('cropfarms','cropfarms.farm_id','=','farms.id')
            ->join('crops','cropfarms.crop_id','=','crops.id')
            ->join('expenses','expenses.farm_id','=','farms.id')
            ->join('stocks','stocks.cropfarm_id','=','cropfarms.id')
            ->join('orders','stocks.id','=','orders.stock_id')
            ->select('farms.UPI','stocks.quantity','orders.quantity as quantity2',DB::raw('SUM(expenses.moneySpent) as moneySpent'))
            ->where('crops.id','=',$id)
            ->groupBy('farms.UPI','stocks.quantity','orders.quantity')
            ->get();
        foreach($farms as $value){
            $exp=$this->user
                ->farms()
                ->join('cropfarms','cropfarms.farm_id','=','farms.id')
                ->join('crops','cropfarms.crop_id','=','crops.id')
                ->join('expenses','expenses.farm_id','=','farms.id')
                ->join('stocks','stocks.cropfarm_id','=','cropfarms.id')
                ->select(DB::raw('SUM(expenses.moneySpent) as moneySpent'))
                ->get();
            foreach($exp as $expenses){
                $exp['wholeExpenses']=$expenses->moneySpent;
            }
            $hav=$this->user
                ->stocks()
                ->join('cropfarms','cropfarms.id','=','stocks.cropfarm_id')
                ->join('crops','crops.id','=','cropfarms.crop_id')
                ->join('orders','orders.stock_id','=','stocks.id')
                ->select(DB::raw('SUM(stocks.quantity+orders.quantity) as quantity,SUM(orders.quantity) as sold_unity,SUM(orders.quantity*stocks.price) as sales'))
                ->get();
            foreach($hav as $harvest){
                $hav['harverst']=$harvest->quantity;
                $hav['sold_unit']=$harvest->sold_unity;
                $hav['sales']=$harvest->sales;
            }
            $farm['UPI']=$value->UPI;
            $farm['quantity']=$value->quantity+$value->quantity2;
            $farm['Expenses']=$value->moneySpent;

            $result[]=$farm;
        }
        if (!empty($exp)){
            $both['farms']=$result;
            $both['Total_expenses']=$exp['wholeExpenses'];
            $both['haverst_quantity_kg']=$harvest->quantity;
            $both['Sold_unity_kg']=$harvest->sold_unity;
            $both['Soles_money']=$harvest->sales;
            $both['profit']=$harvest->sales-$exp['wholeExpenses'];
        }

        $count=$farms->count();
        if($count>0){
            return response()->json(['Data'=>$both],200);
        }else{
            return response()->json(['Message'=>'Success','Data'=>$farms,'Returned_Data'=>$count,'Status'=>200]);
        }
    }
    public function insideProfile(){
        $result=array();
        $farms=$this->user
            ->farms()
            ->join('cropfarms','cropfarms.farm_id','=','farms.id')
            ->join('crops','cropfarms.crop_id','=','crops.id')
            ->join('expenses','expenses.cropfarm_id','=','cropfarms.id')
            ->join('stocks','stocks.cropfarm_id','=','cropfarms.id')
            ->join('orders','orders.stock_id','=','stocks.id')
            ->select('crops.id as cropid','crops.crops',DB::raw('SUM(expenses.moneySpent) as expenses, SUM(stocks.price*orders.quantity) as sales,SUM(stocks.price*orders.quantity)-SUM(expenses.moneySpent) as profit'))
            ->groupBy('crops.id','crops.crops')
            ->get();
        $count=$farms->count();
        if($count>0){
            return response()->json(['Message'=>'Success','Data'=>$farms,'Returned_Data'=>$count,'Status'=>200]);
        }else{
            return response()->json(['Message'=>'Success','Data'=>$farms,'Returned_Data'=>$count,'Status'=>200]);
        }
    }
    }
