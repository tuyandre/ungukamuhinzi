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





Route::post('logout', 'UserController@logout');
Route::post('complete', 'farmer\FarmerController@store');
Route::post('user', 'UserController@getAuthUser');
Route::post('createFarms', 'farmer\FarmController@store');
Route::post('viewFarms', 'farmer\FarmController@index');
Route::post('ShowFarmer','farmer\FarmerController@show');
Route::post('ShowFarm','farmer\FarmController@show');
Route::post('UpdateFarmer','farmer\FarmerController@update');
Route::post('UpdateFarms','farmer\FarmController@update');
Route::post('AddExpense','farmer\ExpenseController@store');
Route::post('ViewExpenses','farmer\ExpenseController@show');
Route::post('AllFarms', 'farmer\ExpenseController@index');
Route::post('addStock','farmer\StockController@store');
Route::post('stock','farmer\StockController@index');
Route::post('updateStock','farmer\StockController@update');
Route::post('SignleStockDetails','farmer\StockController@show');
Route::post('StockWithExpense','farmer\StockController@Profit');
Route::post('publish','farmer\StockController@publish');
Route::post('pending2','farmer\FarmerController@myOrders');
Route::post('changePassword','farmer\FarmerController@changePassword');
Route::post('checkProfit','farmer\FarmerController@checkProfit');
Route::post('process','farmer\FarmerController@processing');
Route::post('delivered2','farmer\FarmerController@delivered');
Route::post('cancelled2','farmer\FarmerController@cancelled');
Route::post('accept','farmer\FarmerController@accept');
Route::post('decline','farmer\FarmerController@cancel');
Route::post('markAsDelivered','farmer\FarmerController@markAsDelivered');
Route::post('restore','farmer\FarmerController@restore');
Route::post('changePhone','farmer\FarmerController@changePhone');
Route::post('createCurrentCrop','farmer\ExpenseController@newCrop');
Route::post('totalProf','farmer\StockController@allProfit');
Route::post('feeds','farmer\StockController@feeds');
Route::post('insideCrop','farmer\FarmController@farmsUsed');
Route::post('insideProfile','farmer\FarmController@insideProfile');





Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
