<?php

namespace App\Http\Controllers\admin;

use App\Customer;
use App\Farmer;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function registerAdmin(Request $request){

        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'phone' => 'required|max:10|min:10|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',

        ]);
        if ($validator->fails()) {
            $response = [
                'Status' => 400,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $user= User::create([
            'fullname' => $request['fullname'],
            'email' => $request['email'],
            'level' => 3,
            'status' => 1,
            'phone' => $request['phone'],
            'password' => Hash::make($request['password']),
        ]);
        return response()->json([
            'Message'=>'Success',
            'Data' => $user,
            'Status' => 200

        ], 200);
    }
    public function loginUser(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',

        ]);
        if ($validator->fails()) {
            $response = [
                'Status' => 400,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        if(is_numeric($request->get('email'))){
            if(Auth::attempt(['phone' => $request->email, 'password' => $request->password])){

                if(Auth::user()->status==1){
                    $user=Auth::user();
                    $user['message']="Sussec";
                    return response()->json($user);
                }else{
                    Auth::logout();
                    return response()->json(['Message'=>'Your acount blocked','Status'=>401],401);
                }


            }else{
                return response()->json([
                    'message' => 'Invalid Credential',
                    'Status' => 401,
                ], 401);
            }
        }else{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

                if(Auth::user()->status==1){
                    $user=Auth::user();
                    $user['message']="Sussecc";
                    return response()->json($user);
                }else{
                    Auth::logout();
                    return response()->json(['Message'=>'Your acount blocked','Status'=>401],401);
                }


            }else{
                return response()->json([
                    'message' => 'Invalid Credential',
                    'Status' => 401,
                ], 401);
            }

        }



        return back()->withInput($request->only('email', 'remember'));
    }

    public function index()
    {
        $farmers=new farmer();
        $farmers=DB::table('farmers')
            ->leftjoin('users','users.id','=','farmers.user_id')
            ->select('users.id','farmers.photo','farmers.fname','farmers.lname','farmers.phone','farmers.identity','users.status','farmers.created_at','farmers.updated_at')
            ->where('users.status','=','1')
            ->get();
        $count=$farmers->count();
        if($count>0){
            return response()->json(['Message'=>'Success','Data'=>$farmers,'Status'=>200,'Data_returned'=>$count]);
        }
        else{
            return response()->json(['Message'=>'Success','Data'=>$farmers,'Status'=>200,'Data_returned'=>$count]);
        }

        //
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
            return response()->json(['Message'=>'Success','Data'=>$customers,'Status'=>200,'Data_returned'=>$count]);
        }
        else{
            return response()->json(['Message'=>'Success','Data'=>$customers,'Status'=>200,'Data_returned'=>$count]);
        }

    }
    public function farmerWithFarms(Request $request){
        $data=new farmer();
        $id=$request->farmerid;
        //return $id;
        $data=DB::table('farms')
            ->join('users','users.id','=','farms.user_id')
            ->join('farmers','users.id','=','farmers.user_id')
            ->select('farms.id','farmers.fname','farmers.lname','farmers.phone','farms.UPI','farms.plotsize','farms.location','farms.created_at','farms.updated_at')
            ->where('farms.user_id','=',$id)
            ->get();
        $count=$data->count();
        if($count>0){
            return response()->json(['Message'=>'Success','Data'=>$data,'Status'=>200,'Returned_data'=>$count]);
        }else{
            return response()->json(['Message'=>'Success','Data'=>$data,'Status'=>200,'Returned_data'=>$count]);
        }
    }
    public function showCrops(Request $request){
        $data=new crops();
        $data=DB::table('crops')
            ->select('crops.id','crops.photo','crops.crops')
            ->get();
        $count=$data->count();
        if($count>0){
            return response()->json(['Message'=>'Success','Data'=>$data,'Status'=>200,'Returned_data'=>$count]);
        }
        else{
            return response()->json(['Message'=>'Success','Data'=>$data,'Status'=>200,'Returned_data'=>$count]);
        }
    }
    public function storeCrops(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'photo' => 'required|image',
            'crops' => 'required',
        ]);
        if ($validator->fails()) {
            $response = [
                'Status' => 400,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $image = $request->file('photo');

        $name = $request->file('photo')->getClientOriginalName();

        $image_name = $request->file('photo')->getRealPath();;

        Cloudder::upload($image_name, null);

        list($width, $height) = getimagesize($image_name);

        $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

        //save to uploads directory
        $image->move(public_path("public/images"), $name);

        $crops = new crops();
        $crops->photo = $image_url;
        $crops->crops=$request->crops;
        $crops->save();
        return response()->json(['Message' =>'New crops registered','Status' => 200],200);
    }
    public function suspendUSer(Request $request){
        $id=$request->userID;
        $mng=DB::table('users')->where('users.id',$id)->update(array('users.status'=>'2'));
        return response()->json(['Message'=>'Success','Status'=>200],200);
    }
    public function suspendedUser(){

        $farmers=new farmer();
        $farmers=DB::table('farmers')
            ->leftjoin('users','users.id','=','farmers.user_id')
            ->select('users.id','farmers.photo','farmers.fname','farmers.lname','farmers.phone','farmers.identity','users.status','farmers.created_at','farmers.updated_at')
            ->where('users.status','=','2')
            ->get();
        $count=$farmers->count();
        if($count>0){
            return response()->json(['Message'=>'Success','Data'=>$farmers,'Status'=>200,'Data_returned'=>$count]);
        }
        else{
            return response()->json(['Message'=>'Success','Data'=>$farmers,'Status'=>200,'Data_returned'=>$count]);
        }


    }
}
