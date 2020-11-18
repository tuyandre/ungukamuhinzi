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



Route::post('login', 'UserController@login');
Route::post('registration', 'UserController@registerUser');
Route::post('sendCode','UserController@sendCode');
Route::post('viewCrops','UserController@viewCrops');
Route::post('Season','FarmerController@seasons');

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


Route::post('DetailCustomer','client\CustomerController@index');
Route::post('CustomerProfile','client\CustomerController@store');
Route::post('UpdateCustomer','client\CustomerController@update');
Route::post('ViewHarvest','client\CustomerController@ViewHarvest');
Route::post('makeOrder','client\CustomerController@makeOrder');
Route::post('pending','client\CustomerController@myOrder');
Route::post('CustomerChangePassword','client\CustomerController@changePassword');
Route::post('delivered','client\CustomerController@delivered');
Route::post('reorder','client\CustomerController@reorder');
Route::post('processed','client\CustomerController@process');
Route::post('cancelled','client\CustomerController@cancelled');
Route::post('cancel','client\CustomerController@cancel');
Route::post('logout', 'UserController@logout');
Route::post('changePhone2','client\FarmerController@changePhone');
Route::post('allOrdered','client\CustomerController@allOrdered');
Route::post('display','client\CustomerController@fillQuantity');
Route::post('supplier','client\CustomerController@supplier');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
