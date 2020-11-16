<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/ungukamuhinzi/register/user',
    [App\Http\Controllers\UserController::class, 'registerUser'
    ])->name('frontend.registerUser');

Route::post('/ungukamuhinzi/login/user',
    [App\Http\Controllers\admin\AdminController::class, 'loginUser'
    ])->name('frontend.loginUser');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
