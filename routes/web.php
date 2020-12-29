<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Ungukamuhinzi/login',
    [App\Http\Controllers\frontend\FrontendController::class, 'getLoginPage'
    ])->name('frontend.getLoginPage');
Route::get('/Ungukamuhinzi/register',
    [App\Http\Controllers\frontend\FrontendController::class, 'getRegisterPage'
    ])->name('frontend.getRegisterPage');

Route::get('/Ungukamuhinzi/register/Ungukamuhinzi/register',
    [App\Http\Controllers\frontend\FrontendController::class, 'getAdminRegisterPage'
    ])->name('frontend.getAdminRegisterPage');

Route::post('/Ungukamuhinzi/register/post/register',
    [App\Http\Controllers\admin\AdminController::class, 'registerAdmin'
    ])->name('frontend.registerAdmin');
Route::post('/Ungukamuhinzi/register/user',
    [App\Http\Controllers\UserController::class, 'registerUser'
    ])->name('frontend.registerUser');

Route::post('/Ungukamuhinzi/login/user',
    [App\Http\Controllers\admin\AdminController::class, 'loginUser'
    ])->name('frontend.loginUser');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//All routes about Administration activities

Route::group(['prefix' => '/Administration/'], function () {
    Route::get('/', [
        'uses' => 'admin\DashboardController@dashboard',
        'as' => 'admin.dashboard'
    ]);

//    user and admin account edition
        Route::get('profiles/change/password', [
            'uses' => 'admin\ProfileController@changePassword',
            'as' => 'admin.getPassword'
        ]);
        Route::post('profiles/update/password', [
            'uses' => 'admin\ProfileController@updatePassword',
            'as' => 'admin.updatePassword'
        ]);

        Route::get('profiles/view/profile', [
            'uses' => 'admin\ProfileController@viewProfile',
            'as' => 'admin.viewProfile'
        ]);
        Route::get('profiles/getInfo', [
            'uses' => 'admin\ProfileController@getInfo',
            'as' => 'admin.getInfo'
        ]);
        Route::post('profiles/update/info', [
            'uses' => 'admin\ProfileController@updateInfo',
            'as' => 'admin.updateInfo'
        ]);
        Route::get('profiles/get/profile', [
            'uses' => 'admin\ProfileController@getProfile',
            'as' => 'admin.getProfile'
        ]);
        Route::post('profiles/update/profile', [
            'uses' => 'admin\ProfileController@updateProfile',
            'as' => 'admin.updateProfile'
        ]);

//        customers routes
    Route::get('Customer/list', [
        'uses' => 'admin\CustomerController@index',
        'as' => 'admin.customer.index'
    ]);
    Route::get('Suspended/Customer', [
        'uses' => 'admin\CustomerController@suspendedCustomerPage',
        'as' => 'admin.customer.suspended'
    ]);
    Route::get('Active/Customer', [
        'uses' => 'admin\CustomerController@activeCustomerPage',
        'as' => 'admin.customer.active'
    ]);

    Route::get('customers/get/list', [
        'uses' => 'admin\CustomerController@allCustomers',
        'as' => 'admin.customer.allCustomers'
    ]);


//        farmers routes
    Route::get('Farmer/list', [
        'uses' => 'admin\FarmerController@index',
        'as' => 'admin.farmer.index'
    ]);
    Route::get('Farmer/get/list', [
        'uses' => 'admin\FarmerController@allFarmer',
        'as' => 'admin.farmer.allFarmer'
    ]);
    Route::get('Farmer/detail/{id}', [
        'uses' => 'admin\FarmerController@farmerDetail',
        'as' => 'admin.farmer.farmerDetail'
    ]);




//    seasons routes

    Route::get('Seasons/list', [
        'uses' => 'admin\SeasonController@index',
        'as' => 'admin.seasons.index'
    ]);
    Route::get('Seasons/get/list', [
        'uses' => 'admin\SeasonController@seasons',
        'as' => 'admin.seasons.allSeasons'
    ]);

    Route::post('Seasons/store', [
        'uses' => 'admin\SeasonController@store',
        'as' => 'admin.seasons.store'
    ]);
    Route::delete('Season/delete/{id}', [
        'uses' => 'admin\SeasonController@delete',
        'as' => 'admin.seasons.delete'
    ]);
    Route::get('Season/show/{id}', [
        'uses' => 'admin\SeasonController@show',
        'as' => 'admin.seasons.showSeason'
    ]);
    Route::put('update/Season', [
        'uses' => 'admin\SeasonController@updateSeason',
        'as' => 'admin.seasons.updateSeason'
    ]);


//crops routes

    Route::get('Crops/list', [
        'uses' => 'admin\CropController@index',
        'as' => 'admin.crops.index'
    ]);
    Route::get('Crops/get/list', [
        'uses' => 'admin\CropController@allCrops',
        'as' => 'admin.crops.allCrops'
    ]);

    Route::post('Crops/store', [
        'uses' => 'admin\CropController@store',
        'as' => 'admin.crops.store'
    ]);
    Route::delete('Crops/delete/{id}', [
        'uses' => 'admin\CropController@delete',
        'as' => 'admin.crops.delete'
    ]);
    Route::get('Crops/show/{id}', [
        'uses' => 'admin\CropController@show',
        'as' => 'admin.crops.showCrop'
    ]);
    Route::put('update/Crops', [
        'uses' => 'admin\CropController@updateCrop',
        'as' => 'admin.crops.updateCrop'
    ]);
















    Route::get('member/detail/{id}', [
        'uses' => 'Admin\MemberController@memberDetail',
        'as' => 'members.memberDetail'
    ]);
    Route::put('member/confirm/{id}', [
        'uses' => 'Admin\MemberController@confirmMember',
        'as' => 'members.confirmMember'
    ]);
    Route::delete('member/delete/{id}', [
        'uses' => 'Admin\MemberController@deleteMember',
        'as' => 'members.deleteMember'
    ]);

});


//all routes about farmers activities
Route::group(['prefix' => '/Farmer/'], function () {
    Route::get('/', [
        'uses' => 'farmer\DashboardController@dashboard',
        'as' => 'farmer.dashboard'
    ]);
    Route::get('viewFarms', 'web\farmer\FarmController@index');
    Route::get('Season', 'web\farmer\SeasonController@index');
    Route::get('viewCrops', 'UserController@viewCrops');
    Route::get('ShowFarmer', 'web\farmer\FarmerController@show');
    Route::post('createFarms', 'web\farmer\FarmController@store');

});

//all routes activities about clients

Route::group(['prefix' => '/Client/'], function () {
    Route::get('/', [
        'uses' => 'client\DashboardController@dashboard',
        'as' => 'client.dashboard'
    ]);


});
