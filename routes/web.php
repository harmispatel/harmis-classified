<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\{ RoleController, CountryController, DashboardController, PropertieController};
use App\Http\Controllers\frontend\{ RegisterController, UserLoginController, PropertyController, PropertyListController, LanguageController};
// use App\Http\Controllers\Frontend\SearchController;

// Google map
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Artisan;

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
Route::get('config-clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    dd("Cache is cleared");
});

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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Route:
    Route::resource('show_user', 'UserController');

    // Role Routes:
    Route::resource('show_role', 'RoleController');

    //Country Route:
    Route::resource('country', 'CountryController');

    //State Route:
    Route::resource('state', 'StateController');

    //Category Route:
    Route::resource('category', 'CategoryController');

    //Propertie Route:
    Route::resource('propertie', 'PropertieController');

    // Language Routes:
    Route::resource('languages', 'LanguageController');

    // Labels Routes:
    Route::resource('labels', 'LabelController');

    //Logout Route:
    Route::get("/logout", [LoginController::class, "adminLogout"])->name('adminLogout');
    Route::post("/logout", [LoginController::class, "logout"])->name("logout");
});

//Country Route In Ajax Call:
Route::post('getState', [PropertieController::class, 'getState'])->name('getState');

//User Logout Route:
Route::post('/userlogout', [UserLoginController::class, 'logout'])->name('userLogout');
Route::get('/userlogout', [UserLoginController::class, 'userLogout'])->name('userLog');

// Property Routes:
Route::get('/', [PropertyController::class, 'index'])->name('showProperty');
Route::post('/getpropertybyprice', [PropertyController::class, 'getpropertybyprice'])->name('getpropertybyprice');
Route::post('/infinitescroll', [PropertyController::class, 'infiniteScroll'])->name('infinitescroll');

Route::get('/create', [PropertyController::class,'create'])->name('create');
Route::post('/addproperty', [PropertyController::class,'store'])->name('addProperty');

//Language DropDown:
Route::get('/get-languages',[LanguageController::class,'getLanguages'])->name('get_languages');

// Route::get('editproperty/{id}',[PropertyController::class,'edit'])->name('editProperty');
// Route::post('upadteproperty/{id}',[PropertyController::class,'update'])->name('updateProperty');
// Route::get('delete/property/{id}',[PropertyController::class,'destroy'])->name('deleteProperty');

// Google map api:
Route::get('google-autocomplete', [GoogleController::class, 'index']);
Route::post('/propertyrentdata', [PropertyController::class, 'getRent'])->name('getRent');


Route::get('set-language', [App\Http\Controllers\LanguageController::class, 'setLanguage']);

Route::get('property-list', [PropertyController::class, 'propertyList'])->name('PropertyList');
//list Scroll:
Route::post('list-scroll', [PropertyListController::class, 'listScroll'])->name('listScroll');
// list Scroll:
Route::resource('property-details', 'frontend\PropertyListController');

Route::get('single-property-details/{id}', [PropertyController::class, 'propertyDetails'])->name('propertyDetails');

