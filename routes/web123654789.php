<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\{ThemeController ,RoleController, CountryController, DashboardController, LanguageController as ControllersLanguageController, PropertieController};
use App\Http\Controllers\frontend\{ RegisterController, UserLoginController, PropertyController, LanguageController, PropertyListController};

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
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    dd("Cache is cleared");
});

Route::group(['middleware' => ['guest']], function () {

    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/login', [LoginController::class, "index"])->name('login.form');

    Route::post('/userlogin', [UserLoginController::class, 'login'])->name('userLogin');
    Route::get('/userloginform', [UserLoginController::class, 'show'])->name('userLoginForm');

    Route::post('/register', [RegisterController::class, 'create'])->name('userRegister');
    Route::get('/registerform', [RegisterController::class, 'index'])->name('register');

    // Route::get('/agentproperty', function(){
    //     dd('Success');
    // })->name('agentpropertylist');
    Route::get('/agentproperty', [PropertyController::class,'agentpropertylist'])->name('agentpropertylist');

    // Route::post('/addproperty', [PropertyController::class,'store'])->name('addProperty');
    // Route::post('/addproperty', function(){
    //     dd('New');
    // })->name('addProperty');

    
});
Route::get('userprofile', [RegisterController::class, 'userprofile'])->name('userprofile');
Route::post('userupdate', [RegisterController::class, 'userupdate'])->name('userupdate');


Route::get('/change-language', [LanguageController::class, 'changeLang'])->name('changeLang');

// Dashboard Route:
Route::group(['middleware' => ['auth', 'check.user']], function () {

    // Dashboard Route:
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Route:
    Route::resource('show_user', 'UserController');

    Route::get('profile' ,[UserController::class, 'adminprofile'])->name('profile');

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

    // Layout/Theme Routes:
    Route::resource('theme', 'ThemeController');
    Route::get('activetheme/{id}', [ThemeController::class, 'themeupdate'])->name('activetheme');
    Route::get('activethemedetails/{id}', [ThemeController::class, 'detailsupdate'])->name('activethemedetails');
    Route::post('genralsetting', [ThemeController::class, 'genralsetting'])->name('genralsetting');

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
Route::get('/{id?}', [PropertyController::class, 'index'])->name('showProperty');
Route::post('/getpropertybyprice', [PropertyController::class, 'getpropertybyprice'])->name('getpropertybyprice');
Route::post('/infinitescroll', [PropertyController::class, 'infiniteScroll'])->name('infinitescroll');

// Route::get('/agentproperty', [PropertyController::class,'agentpropertylist'])->name('agentpropertylist');
// Route::get('/agentproperty', function(){
//     dd('Success');
// })->name('agentpropertylist');
Route::get('/addagentProperty', [PropertyController::class,'agentProperty'])->name('addagentProperty');
Route::post('/addproperty', [PropertyController::class,'store'])->name('addProperty');
Route::get('/editAgentProperty/{id}', [PropertyController::class,'editAgentProperty'])->name('editAgentProperty');
Route::post('/updateagentProperty/{id}', [PropertyController::class,'update'])->name('updateagentProperty');
Route::delete('/agentpropertydelete/{id}', [PropertyController::class,'destroy'])->name('agentpropertydelete');

//Language DropDown:
Route::get('/get-languages',[LanguageController::class,'getLanguages'])->name('get_languages');

// Route::get('editproperty/{id}',[PropertyController::class,'edit'])->name('editProperty');
// Route::post('upadteproperty/{id}',[PropertyController::class,'update'])->name('updateProperty');
// Route::get('delete/property/{id}',[PropertyController::class,'destroy'])->name('deleteProperty');

// Google map api:
Route::post('/propertyrentdata', [PropertyController::class, 'getRent'])->name('getRent');

Route::post('set-language', [ControllersLanguageController::class, 'setLanguage'])->name('set-language');

Route::get('property-list', [PropertyController::class, 'propertyList'])->name('PropertyList');

//list Scroll:
Route::post('list-scroll', [PropertyListController::class, 'listScroll'])->name('listScroll');

// Theme Two Map Property
Route::post('mapproperty', [PropertyController::class, 'mappropertytwo'])->name('mapproperty');

// // Theme Two Map Property
// Route::post('propertythree', [PropertyController::class, 'mappropertythree'])->name('propertythree');

// list Scroll:
// Route::resource('property-details', 'PropertyListController');
Route::get('property-details/list', [PropertyListController::class,'index'])->name('property-details.index');

Route::get('single-property-details/{id}', [PropertyController::class, 'propertyDetails'])->name('propertyDetails');
