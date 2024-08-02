<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\IdentitydocController;
use App\Http\Controllers\Api\PlatController;

//Route::get('/user', function (Request $request) {
//return $request->user();
//})->middleware('auth:sanctum');


Route::apiResource('companies', CompanyController::class);
Route::apiResource('identitydocs', IdentitydocController::class);
Route::apiResource('plats', PlatController::class);

//Route::apiResource('identitydocs', IdentitydocController::class);

