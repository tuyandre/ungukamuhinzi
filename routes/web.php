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

});

//all routes activities about clients

Route::group(['prefix' => '/Client/'], function () {
    Route::get('/', [
        'uses' => 'client\DashboardController@dashboard',
        'as' => 'client.dashboard'
    ]);

});
