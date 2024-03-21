<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('principal');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');

// Route::get('/login',[LoginController::class,'index'])->name('auth.login');
Route::post('/login',[LoginController::class,'store'])->name('auth.store');
Route::post('/logout',[LogoutController::class,'store'])->name('auth.logout');
Route::get('/register',[RegisterController::class,'index'])->name('register.index');
Route::post('/register',[RegisterController::class,'store'])->name('register.store');

//Routes to static webpages
Route::middleware('auth')->group(function(){
    Route::get('/about',[StaticPagesController::class,'about'])->name('laws.about');
    Route::get('/contact',[StaticPagesController::class,'contact'])->name('laws.contact');
    Route::post('/contact',[StaticPagesController::class,'store'])->name('laws.store');
});

Route::middleware('auth')->group(function(){
    Route::get('/user/{id}',[UserController::class,'index'])->name('user.index');

    Route::get('/brands',[BrandController::class,'index'])->name('brands.index');
    Route::get('/brands/create',[BrandController::class,'create'])->name('brands.create');
    Route::post('/brands',[BrandController::class,'store'])->name('brands.store');
    Route::get('/edit/{brand}',[BrandController::class,'edit'])->name('brands.edit');
    Route::put('/brands/{brand}',[BrandController::class,'update'])->name('brands.update');
    // Route::delete('/brands/{brand}',[BrandController::class,'destroy'])->name('brands.destroy');
});