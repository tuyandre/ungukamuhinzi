<?php

namespace App\Http\Controllers;

use App\Farmer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
//use Tymon\JWTAuth\Facades\JWTAuth;


class UserController extends Controller
{
    public $loginAfterSignUp = true;
    public function registerUser(Request $request){
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'phone' => 'required|max:10|min:10|unique:users',
            'password' => 'required',
            'level' => 'required',
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

        $user  = User::create([
            'fullname'=>$request->fullname,
            'phone'=>$request->phone,
            'status'=>1,
            'password'=>Hash::make($request->password),
            'level'=>$request->level
        ]);

        if ($request->level==1){
            $farmers = new Farmer();
            $farmers->fname = $user->fullname;
//            $farmers->fname = explode(',',$user->fullname,0);
            $farmers->lname = $user->fullname;
//            $farmers->lname = explode(' ',$user->fullname,1);
            $farmers->phone = $user->phone;
            $farmers->identity=$request->identity;
            $farmers->user_id=$user->id;
            $farmers->save();
            return response()->json([
                'Message'=>'Success',
                'other'=>'farmer',
                'Data' => $user,
                'Status' => 200

            ], 200);
        }elseif ($request->level==2){
            $clients = new Farmer();
            $clients->fname = $user->fullname;
            $clients->lname =$user->fullname;
            $clients->phone = $user->phone;
            $clients->identity=$request->identity;
            $clients->user_id=$user->id;
            $clients->save();
            return response()->json([
                'Message'=>'Success',
                'other'=>'client',
                'Data' => $user,
                'Status' => 200

            ], 200);
        }else{
            return response()->json([
                'Message'=>'Success',
                'other'=>'none',
                'Data' => $user,
                'Status' => 200

            ], 200);
        }

    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'phone' => 'required|min:10|max:10',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [

                'Data' => 'Validation Error.',
                'message' => $validator->errors(),
                'Status' => 400,
            ];
            return response()->json($response, 400);
        }
        $input = $request->only('phone', 'password');
        $jwt_token = null;
        $phone=$request->get('phone');
        try{
            $users = User::where('phone','=',$phone)->where('status','=',1)->get();
            if (!$jwt_token = JWTAuth::attempt($input)) {
                return response()->json([
                    'Message' => 'Invalid Credential',
                    'Status' => 401,
                ], 401);
            }
        } catch (JWTException $e){
            return response()->json(['Error'=>'could_not_create_token','Status'=>400],400);

        }

        $user = array();
        $usr = array();
        foreach($users as $us){
            $usr['message']='Success';
            $usr['id']=$us->id;
            $usr['fullname']=$us->fullname;
            $usr['phone']=$us->phone;
            $usr['level']=$us->level;
            $usr['token']=$jwt_token;

            array_push($user,$usr);
        }
        $count=$users->count();
        if($count>0){
            return response()->json($user);
        }else{
            return response()->json(['Message'=>'Your acount blocked','Status'=>401],401);
        }
    }

    public function logout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required'
        ]);
        if ($validator->fails()) {
            $response = [
                'message' => $validator->errors(),
                'Data' => 'Validation Error.',
                'Status' => 400,
            ];
            return response()->json($response, 400);
        }
        $logout = Auth::logout(true);
        if (is_null($logout)) {
            return response()->json([

                'message' => 'User logged out successfully',
                'state' => $logout,
                'Status' => 200,
            ], 200);
        } else {
            return response()->json([

                'Message' => 'Sorry, the user cannot be logged out',
                'state' => $logout,
                'Status' => 400,
            ], 400);
        }


    }

    public function getAuthUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required']);

        if ($validator->fails()) {
            $user = JWTAuth::authenticate($request->token);
            $response = [
                'message' => $validator->errors(),
                'Data' => 'Validation Error.',
                'Status' => 400,
            ];

        }
        return response()->json(['user' => $user],200);
    }


    public function sendCode(Request $request){
        $codes= new user();
        $send=$codes->phone=$request->phone;
        $usr=DB::table('users')->where('phone','=',$send)
            ->get();
        if($usr->count()>0) {
            $code = rand(1111, 9999);
            $data = array(
                "from" => 'UngukaMuhinzi',
                "to" => '250788866742',
                "api_key" => "01ab836b",
                "api_secret" => "ZD0NP5wNmUsRmDCy",
                "text" => "Unguka Muhinzi Verification Code " . $code
            ,);
            $url = "https://rest.nexmo.com/sms/json";
            $data = http_build_query($data);
            $username = "01ab836b";
            $password = "ZD0NP5wNmUsRmDCy";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $result = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            if ($result){
                $user=DB::table('users')->where('phone','=',$send)->update(array('code'=>$code));
                return response()->json(['Message'=>'success','Data'=>$code,'Status'=>200],200);
            }else{
                return response()->json(['result' => "not"], 200);
            }


        }
    }
    public function viewCrops(){
        $crops=DB::table('crops')->get();
        $count=$crops->count();
        if($count>0){
            return response()->json(['Message'=>'Success','Data'=>$crops,'Data_returned'=>$count,'Status'=>200],200);
        }else{
            return response()->json(['Message'=>'Success','Data'=>'There is no any kind of crops you have','Status'=>200],200);
        }
    }
}
