<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeasonController extends Controller
{
    public function index()
    {
        if (Auth::check())
            if (Auth::user()->level == 3) {
                return view('backend.admin.seasons.allSeasons');
            } else {
                Auth::logout();
            }
        else {
            return view('welcome');
        }
    }

    public function seasons()
    {

        $season = Season::all();
        $count = $season->count();
        if ($count > 0) {
            return response()->json(['seasons' => $season], 200); //
        } else {
            return response()->json(['seasons' => $season], 200);
        }
    }
    public function store(Request $request){

        $season=new Season();
        $season->seasonLenght=$request['name'];
        $season->status="active";
        $season->save();
        return response()->json(['season' => "ok"], 200); //

    }
    public function delete($id){
        $season=Season::find($id);
        if ($season){
            $season->delete();
            return response()->json(['season' => 'ok'], 200);
        }
    }
}

