<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PropertieController;
use App\Http\Controllers\frontend\RegisterController;
use App\Http\Controllers\frontend\UserLoginController;
use App\Http\Controllers\frontend\PropertyController;


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
Route::group(['middleware' => ['guest']], function () {
    // Route::get('/user',[UserLoginController::class,'index'])->name('loginForm');
    Route::post('/login',[LoginController::class,'login'])->name('login');
    Route::get('/login',[LoginController::class,"index"])->name('login.form');

    Route::post('/userlogin',[UserLoginController::class,'login'])->name('userLogin');
    Route::get('/userloginform',[UserLoginController::class,'show'])->name('userLoginForm');

    Route::post('/register',[RegisterController::class,'create'])->name('userRegister');
    Route::view('/registerform','frontend.auth.register');
});

// Dashboard Route:
Route::group(['middleware' => ['auth']], function () {

    // Dashboard Route:
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // User Route:
    Route::resource('show_user', 'UserController');

    // Role Routes:
    Route::resource('show_role', 'RoleController');

    //Country Route
    Route::resource('country', 'CountryController');

    //State Route
    Route::resource('state', 'StateController');

    //Category Route
    Route::resource('category', 'CategoryController');

    //Propertie Route
    Route::resource('propertie', 'PropertieController');

    //Country Route In Ajax Call
    Route::post('getState',[PropertieController::class,'getState'])->name('getState');

    //Logout Route
    Route::get("/logout",[LoginController::class,"logout"])->name("logout");
});

Route::get('/userlogout',[UserLoginController::class,'logout'])->name('userLogout');

// Property Routes
Route::get('/',[PropertyController::class,'index'])->name('showProperty');
// Route::get('/create', [PropertyController::class,'create'])->name('create');
// Route::post('/addproperty', [PropertyController::class,'store'])->name('addProperty');
// Route::get('editproperty/{id}',[PropertyController::class,'edit'])->name('editProperty');
// Route::post('upadteproperty/{id}',[PropertyController::class,'update'])->name('updateProperty');
// Route::get('delete/property/{id}',[PropertyController::class,'destroy'])->name('deleteProperty');
