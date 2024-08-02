<?php

use App\Http\Controllers\IdentitydocController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;


Route::get('/', function () {
return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route pour les company
Route::middleware('auth')->group(function () {
    Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/company/create',[CompanyController::class, 'create'])->name('company.create');
    Route::post('/company',[CompanyController::class, 'store'])->name('company.store');
    Route::get('/company/{company}',[CompanyController::class, 'show'])->name('company.show');
    Route::get('/company/{job}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::patch('/company/{job}', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('/company/{job}', [CompanyController::class, 'destroy'])->name('company.destroy');
});

//Route pour les identitydoc
Route::middleware('auth')->group(function () {
    Route::get('/identitydocs', [IdentitydocController::class, 'index'])->middleware(['auth', 'verified'])->name('identitydoc.index');
});

//Route pour les plats
Route::middleware('auth')->group(function () {
    Route::get('/plats', [PlatController::class, 'index'])->middleware(['auth', 'verified'])->name('plat.index');
});

require __DIR__.'/auth.php';
