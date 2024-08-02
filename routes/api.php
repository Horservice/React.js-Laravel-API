<?php


use App\Http\Controllers\Api\PassportAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\IdentitydocController;
use App\Http\Controllers\Api\PlatController;

//Route::get('/user', function (Request $request) {
//return $request->user();
//})->middleware('auth:sanctum');


Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::apiResource('companies', CompanyController::class);
    Route::apiResource('identitydocs', IdentitydocController::class);
    Route::apiResource('plats', PlatController::class);
    Route::get('profil', [PassportAuthController::class, 'showUserInfo']);
});


//Route::apiResource('companies', CompanyController::class);
//Route::apiResource('identitydocs', IdentitydocController::class);
//Route::apiResource('plats', PlatController::class);

//Route::apiResource('identitydocs', IdentitydocController::class);

