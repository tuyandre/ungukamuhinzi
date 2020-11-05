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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
