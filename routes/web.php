<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReleaseController;
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
    Route::get('/brands/{brand}',[BrandController::class,'edit'])->name('brands.edit');
    Route::put('/brands/{brand}',[BrandController::class,'update'])->name('brands.update');
    
    Route::get('/cars/edit/{car}/{brand}',[CarController::class,'show'])->name('cars.show');
    Route::put('/cars/{car}',[CarController::class,'update'])->name('cars.update');
    Route::get('/cars/create/{brand}',[CarController::class,'create'])->name('cars.create');
    Route::get('/cars/{brand}',[CarController::class,'index'])->name('cars.index');
    Route::delete('/cars/{carId}/{brandId}',[CarController::class,'destroy'])->name('cars.destroy');

    Route::get('/releases',[ReleaseController::class,'index'])->name('releases.index');
    Route::get('releases/show/{release}',[ReleaseController::class,'show'])->name('releases.show');

    Route::post('/comments',[CommentController::class,'store'])->name('comments.store');
    
    Route::get('/countries',[CountryController::class,'index'])->name('countries.index');

    Route::get('/provinces',[ProvinceController::class,'index'])->name('provinces.index');

    Route::get('/dealers',[DealerController::class,'index'])->name('dealers.index');
});