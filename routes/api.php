<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MonthlyTourController;
use App\Http\Controllers\TourCatalogueController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


    ////////////////////////// AUTH
    Route::post('/login',[AuthController::class, 'login']);
    Route::middleware('auth:api')->post('/logout',[AuthController::class, 'logout']);
    Route::post('/register',[AuthController::class, 'register']);

    ///////////////////////// USERS

    Route::middleware('auth:api')->get('/all-users',[UserController::class, 'all_users']);
    // Route::middleware('auth:api')->get('/user_info{id}',[UserController::class, 'all_users']);

    Route::get('/user_info/{id}',[UserController::class, 'user_info']);

    ////////////////////////// TOURS
    Route::post('/monthly-tour-add',[MonthlyTourController::class, 'store']);
    Route::get('/monthly-tour-list',[MonthlyTourController::class, 'index']); 
    Route::get('/monthly-tour-show-id/{tour}',[MonthlyTourController::class, 'showMonthlyTour']); 
    Route::post('/monthly-tour-delete/{tour}',[MonthlyTourController::class, 'destroy']); 
    Route::post('/monthly-tour-update/{tour}',[MonthlyTourController::class, 'update']); 



    ///////////////////////// CATALOGUE
    Route::post('/catalogue-add',[TourCatalogueController::class, 'store']); 
    Route::get('/catalogue-list',[TourCatalogueController::class, 'index']); 
    Route::get('/show-catalogue-tour/{tour}',[TourCatalogueController::class, 'showTour']); 
    Route::post('/catalogue-tour-delete/{tour}',[TourCatalogueController::class, 'destroy']); 
    Route::post('/catalogue-tour-update/{tour}',[TourCatalogueController::class, 'update']); 

    ///////////////////////// EQUIPMENT
    Route::post('/equipment-add',[EquipmentController::class, 'store']);
    Route::get('/equipment-list',[EquipmentController::class, 'equipmentList']);





