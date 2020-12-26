<?php

namespace App\Http\Controllers\admin;

use App\Crop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CropController extends Controller
{
    public function index()
    {
        if (Auth::check())
            if (Auth::user()->level == 3) {
                return view('backend.admin.crops.allCrops');
            } else {
                Auth::logout();
            }
        else {
            return view('welcome');
        }
    }
    public function allCrops(){
        $crop=Crop::all();
        return response()->json(['crops' => $crop], 200); //
    }
    public function show($id){
        $crop=Crop::find($id);
        if ($crop){
            return response()->json(['crops' => $crop], 200);
        }
    }
    public function updateCrop(Request $request){
        $crop=Crop::find($request['id']);
        if ($crop){
            $crop->crops=$request['name'];
            $crop->save();
            return response()->json(['crops' => 'ok'], 200);
        }
    }
    public function store(Request $request){
        $file=$request->file('photo');
        $filename =time().$file->getClientOriginalName();
        $file->move(public_path('backend/crops'),$filename);


        $crop=new Crop();
        $crop->crops=$request['name'];
        $crop->photo=$filename;
        $crop->save();
        return response()->json(['crop' => "ok"], 200); //

    }
    public function delete($id){
        $crop=Crop::find($id);
        if ($crop){
            $crop->delete();
            return response()->json(['crops' => 'ok'], 200);
        }
    }
}
