<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function changePassword()
    {
        if (Auth::check()){
            return view('backend.admin.profiles.changePassword');
        }else{
            return view('welcome');
        }
    }
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password'],
            [
                'old_password.required' => ' The Old password field is required.',
                'password.required' => ' The password field is required.',
                'confirm_password.required' => ' The Confirm password field is required.',
                'password.min' => ' The password must be at least 8 characters.',
                'confirm_password.min' => ' The password must be at least 8 characters.',
            ]);

        if (Auth::check())
        {
            $user=User::find(Auth::User()->id);

            if (Hash::check($request['old_password'], Auth::User()->password)){
                $user->password=bcrypt($request['password']);
                $user->save();
                return response()->json(['password' => 'ok'], 200);

            }
            else {
                return response()->json(['password' => 'not'], 200);
            }

        }else{
            return view('welcome');
        }
    }
    public function getProfile()
    {
        if (Auth::check()){
            return view('backend.admin.profiles.changeProfile');
        }else{
            return view('welcome');
        }
    }
    public function viewProfile()
    {
        if (Auth::check()){
            return view('backend.admin.profiles.viewProfile');
        }else{
            return view('welcome');
        }
    }
    public function getInfo()
    {
        if (Auth::check()){
            return view('backend.admin.profiles.editInfo');
        }else{
            return view('welcome');
        }
    }
    public function updateInfo(Request $request){
        if (Auth::check()){
            $user=User::find(Auth::user()->id);
            if ($user) {
                $user->fullname = $request['fullname'];
                $user->email = $request['email'];
                $user->phone = $request['phone'];
                $user->save();
                return response()->json(['info' => 'ok'], 200);
            }
        }else{
            return view('welcome');
        }
    }
    public function updateProfile(Request $request){
        if (Auth::check()){
            $user=User::find(Auth::user()->id);
            if ($user) {
                if ($user->profile_photo_path) {
                    if (file_exists(public_path('backend/assets/users/profiles/' . $user->profile_photo_path))) {
                        unlink(public_path('backend/assets/users/profiles/' . $user->profile_photo_path));
                    }
                }

                $file=$request->file('profile');
                $filename =time().$file->getClientOriginalName();
                $file->move(public_path('backend\assets\users\profiles'),$filename);


                $user->profile_photo_path = $filename;
                $user->save();
                return response()->json(['profile' => 'ok'], 200);
            }
        }else{
            return view('welcome');
        }
    }
}
