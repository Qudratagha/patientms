<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\PaymentPlanController;
use App\Http\Controllers\Api\ExtraController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\RentController;
use App\Http\Controllers\Api\PartyTypeController;
use App\Http\Controllers\Api\PartyController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login',[AuthController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']], function (){
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me']);
    Route::get('refresh', [AuthController::class, 'refresh']);

    Route::get('dashboard',[DashboardController::class,'index']);

    Route::resource('locations', LocationController::class);
    Route::resource('paymentPlans', PaymentPlanController::class);
    Route::resource('extras', ExtraController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('units', UnitController::class);
    Route::resource('sales', SaleController::class);
    Route::resource('rents', RentController::class);
    Route::resource('partyTypes', PartyTypeController::class);
    Route::resource('parties', PartyController::class);
    Route::resource('products', ProductController::class);
});

