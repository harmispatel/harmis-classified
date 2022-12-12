<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\{
    MasterController,
    PropertyController,
    FilterController
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
Route::get('/get-properties', [PropertyController::class, 'getProperties']);
Route::get('/get-propertie-details/{slug}', [PropertyController::class, 'getPropertiesdetail']);
Route::get('/get-bookmarks', [PropertyController::class, 'getBookmarks']);
Route::post('/add-to-bookmarks', [PropertyController::class, 'addToBookmarks']);
Route::delete('/remove-from-bookmarks', [PropertyController::class, 'removeFromBookmarks']);

// Filter Property
Route::post('/property-filter', [FilterController::class, 'propertyfilter']);
