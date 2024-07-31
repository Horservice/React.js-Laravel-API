<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\PassportController;
use App\Http\Controllers\Api\PlatController;

//Route::get('/user', function (Request $request) {
//return $request->user();
//})->middleware('auth:sanctum');


Route::apiResource('companies', CompanyController::class);
Route::apiResource('passports', PassportController::class);
//Note perso ajouter les route api de passport et recipe
Route::apiResource('plats', PlatController::class);


