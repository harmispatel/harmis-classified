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
use App\Http\Controllers\frontend\LanguageController;

// Google map
use App\Http\Controllers\GoogleController;


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

    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/login', [LoginController::class, "index"])->name('login.form');

    Route::post('/userlogin', [UserLoginController::class, 'login'])->name('userLogin');
    Route::get('/userloginform', [UserLoginController::class, 'show'])->name('userLoginForm');

    Route::post('/register', [RegisterController::class, 'create'])->name('userRegister');
    Route::get('/registerform', [RegisterController::class, 'index'])->name('register');
});

Route::get('/change-language', [LanguageController::class, 'changeLang'])->name('changeLang');

// Dashboard Route:
Route::group(['middleware' => ['auth', 'check.user']], function () {

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


    //Logout Route
    Route::get("/logout", [LoginController::class, "adminLogout"]);
    Route::post("/logout", [LoginController::class, "logout"])->name("logout");
});

//Country Route In Ajax Call
Route::post('getState', [PropertieController::class, 'getState'])->name('getState');

//User Logout Route:
Route::post('/userlogout', [UserLoginController::class, 'logout'])->name('userLogout');
Route::get('/userlogout', [UserLoginController::class, 'userLogout'])->name('userLog');

// Property Routes
Route::get('/', [PropertyController::class, 'index'])->name('showProperty');
Route::post('/getpropertybyprice', [PropertyController::class, 'getpropertybyprice'])->name('getpropertybyprice');
Route::post('/infinitescroll', [PropertyController::class, 'infiniteScroll'])->name('infinitescroll');


Route::get('/create', [PropertyController::class,'create'])->name('create');
Route::post('/addproperty', [PropertyController::class,'store'])->name('addProperty');


// Route::get('editproperty/{id}',[PropertyController::class,'edit'])->name('editProperty');
// Route::post('upadteproperty/{id}',[PropertyController::class,'update'])->name('updateProperty');
// Route::get('delete/property/{id}',[PropertyController::class,'destroy'])->name('deleteProperty');

// Google map api:

// Route::get('google-autocomplete', [GoogleController::class, 'index']);

Route::post('/propertyrentdata', [PropertyController::class, 'getRent'])->name('getRent');
