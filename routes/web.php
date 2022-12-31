<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\Admin\{AuthController,ProfileController,UserController,OutletController,BannerController};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login',[AuthController::class,'getLogin'])->name('getLogin');
Route::post('/admin/login',[AuthController::class,'postLogin'])->name('postLogin');

Route::group(['middleware'=>['admin_auth']],function(){
    Route::get('/admin/dashboard',[ProfileController::class,'dashboard'])->name('dashboard');
    // users
    Route::get('/admin/users',[UserController::class,'index'])->name('users.index');
    Route::get('/admin/users/register',[UserController::class,'register'])->name('users.register');
    Route::post('/admin/users/store',[UserController::class,'store'])->name('users.store');
    Route::get('/admin/users/edit/{id}',[UserController::class,'edit'])->name('users.edit');
    Route::get('/admin/users/delete/{id}',[UserController::class,'delete'])->name('users.delete');
    Route::post('/admin/users/update/{id}',[UserController::class,'update'])->name('users.update');
    // outlets
    Route::get('/admin/outlets',[OutletController::class,'index'])->name('outlets.index');
    Route::get('/admin/outlets/register',[OutletController::class,'register'])->name('outlets.register');
    Route::post('/admin/outlets/store',[OutletController::class,'store'])->name('outlets.store');
    Route::get('/admin/outlets/edit/{id}',[OutletController::class,'edit'])->name('outlets.edit');
    Route::get('/admin/outlets/delete/{id}',[OutletController::class,'delete'])->name('outlets.delete');
    Route::post('/admin/outlets/update/{id}',[OutletController::class,'update'])->name('outlets.update');

    // outlets banner
    Route::get('/admin/outlets/banners',[BannerController::class,'index'])->name('outlets.banners.index');
    Route::get('/admin/outlets/banners/register',[BannerController::class,'register'])->name('outlets.banners.register');
    Route::post('/admin/outlets/banners/store',[BannerController::class,'store'])->name('outlets.banners.store');
    Route::get('/admin/outlets/banners/edit/{id}',[BannerController::class,'edit'])->name('outlets.banners.edit');
    Route::get('/admin/outlets/banners/delete/{id}',[BannerController::class,'delete'])->name('outlets.banners.delete');
    Route::post('/admin/outlets/banners/update/{id}',[BannerController::class,'update'])->name('outlets.banners.update');

    // outlets banner
    Route::get('/admin/outlets/festons',[OutletController::class,'index'])->name('outlets.festons.index');
    Route::get('/admin/outlets/festons/register',[OutletController::class,'register'])->name('outlets.festons.register');
    Route::post('/admin/outlets/festons/store',[OutletController::class,'store'])->name('outlets.festons.store');
    Route::get('/admin/outlets/festons/edit/{id}',[OutletController::class,'edit'])->name('outlets.festons.edit');
    Route::get('/admin/outlets/festons/delete/{id}',[OutletController::class,'delete'])->name('outlets.festons.delete');
    Route::post('/admin/outlets/festons/update/{id}',[OutletController::class,'update'])->name('outlets.festons.update');

    // logout
    Route::get('/admin/logout',[ProfileController::class,'logout'])->name('logout');
});


