<?php

namespace App\Http\Middleware;

use Closure;

class Farmer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {


            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => 'Token is Invalid']);
            }
            else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){

                return response()->json(['status' => 'Token is Expired']);
            }
            else{

                return response()->json(['status' => 'Authorization Token not found']);
            }
        }
        if($user->level !=1){
            return response()->json(['status' => 'you are not the farmer please']);
        }
        return $next($request);
    }
}
