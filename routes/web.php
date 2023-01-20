<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\{AmenitiesController, BlogController, ThemeController ,RoleController, CountryController, DashboardController, FooterController, PropertieController, PropertyConditionController, SliderController};
use App\Http\Controllers\frontend\{DefaultController, RegisterController, UserLoginController, PropertyController, PropertyListController, LanguageController};
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

Route::group(['middleware' => ['auth','Agent']], function(){
    // Agent Property
    Route::get('/agentproperty', [PropertyController::class,'agentpropertylist'])->name('agentpropertylist');
    Route::get('/create', [PropertyController::class,'create'])->name('create');
    Route::get('/addagentProperty', [PropertyController::class,'agentProperty'])->name('addagentProperty');
    Route::post('/addproperty', [PropertyController::class,'store'])->name('addProperty');
    Route::get('/editAgentProperty/{id}', [PropertyController::class,'editAgentProperty'])->name('editAgentProperty');
    Route::post('/updateagentProperty/{id}', [PropertyController::class,'update'])->name('updateagentProperty');
    Route::delete('/agentpropertydelete/{id}', [PropertyController::class,'destroy'])->name('agentpropertydelete');

    // User Update
    Route::get('userprofile', [RegisterController::class, 'userprofile'])->name('userprofile');
    Route::post('userupdate', [RegisterController::class, 'userupdate'])->name('userupdate');
});



Route::any('property-lists', [PropertyListController::class, 'index'])->name('property-lists');


// allagent
Route::get('/allagent', [PropertyController::class,'allagent'])->name('allagent');

// Blog view
Route::get('/blog/{id}', [DefaultController::class,'showblog'])->name('showblog');
Route::get('/allblogs', [DefaultController::class,'showAllBlog'])->name('allblogs');

// Contact Us
Route::get('contactus', [DefaultController::class, 'contactus'])->name('contactus');
Route::post('contactmail', [DefaultController::class, 'contactusmail'])->name('contactusmail');
Route::post('agentContact', [DefaultController::class, 'agentContact'])->name('agentContact');

Route::post('/mapproperty', [PropertyController::class, 'mappropertytwo'])->name('mapproperty');
Route::get('/agentdetail/{id}', [PropertyController::class,'agentdetail'])->name('agentdetail');
Route::get('/change-language', [LanguageController::class, 'changeLang'])->name('changeLang');

Route::get('property-list', [PropertyController::class, 'propertyList'])->name('PropertyList');

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
    // Route::get('propertie/update/{id}', [PropertieController::class, 'update'])->name('propertie-update');

    // Language Routes:
    Route::resource('languages', 'LanguageController');

    // Labels Routes:
    Route::resource('labels', 'LabelController');

    // Layout/Theme Routes:
    Route::resource('theme', 'ThemeController');

    // Slider Routes:
    Route::resource('sliders', 'SliderController');

    // Blog Routes:
    Route::resource('blogs', 'BlogController');

    // Amenities Routes:
    Route::resource('amenities', 'AmenitiesController');

    // Propery Condition Routes:
    Route::resource('propertycondition', 'PropertyConditionController');

     // Layout/Theme Routes:
     Route::resource('theme', 'ThemeController');
     Route::get('activetheme/{id}', [ThemeController::class, 'themeupdate'])->name('activetheme');
     Route::get('activethemedetails/{id}', [ThemeController::class, 'detailsupdate'])->name('activethemedetails');
     Route::post('genralsetting', [ThemeController::class, 'genralsetting'])->name('genralsetting');
    
    // Footer Routes:
    Route::get('siteseting', [FooterController::class, 'index'])->name('footerdetails');
    Route::post('settingsupdate', [FooterController::class, 'update'])->name('settingsupdate');

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


//Language DropDown:
Route::get('/get-languages',[LanguageController::class,'getLanguages'])->name('get_languages');

// Google map api:
Route::post('/propertyrentdata', [PropertyController::class, 'getRent'])->name('getRent');

Route::post('set-language', [App\Http\Controllers\LanguageController::class, 'setLanguage'])->name('set-language');


//list Scroll:
Route::post('/list-scroll', [PropertyListController::class, 'listScroll'])->name('listScroll');

Route::get('single-property-details/{id}', [PropertyController::class, 'propertyDetails'])->name('propertyDetails');

