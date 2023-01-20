<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\{
    MasterController,
    PropertyController,
    FilterController,
    ZoneController
};

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Property Types
Route::get('/get-property-types', [MasterController::class, 'getCategories']);

// Properties
// Route::get('/get-properties', [PropertyController::class, 'getProperties']);
Route::post('/get-properties', [PropertyController::class, 'getProperties']);
Route::post('/get-propertie-details', [PropertyController::class, 'getPropertiesdetail']);
Route::post('/get-bookmarks', [PropertyController::class, 'getBookmarks']);
Route::post('/add-to-bookmarks', [PropertyController::class, 'addToBookmarks']);
Route::delete('/remove-from-bookmarks', [PropertyController::class, 'removeFromBookmarks']);

// Add Property
Route::post('/add-property', [PropertyController::class, 'addProperty']);


// Property Amenitys
Route::post('/property-Amenities', [PropertyController::class, 'propertyAmenities']);

// Property Condition
Route::post('/property-condition', [PropertyController::class, 'propertyCondition']);

// Zones
Route::post('/country-list', [ZoneController::class, 'country']);
Route::post('/state-list', [ZoneController::class, 'state']);

// Filter Property
Route::post('/property-filter', [FilterController::class, 'propertyfilter']);
