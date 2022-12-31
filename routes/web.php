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
use App\Http\Controllers\Admin\{AuthController,ProfileController,UserController};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login',[AuthController::class,'getLogin'])->name('getLogin');
Route::post('/admin/login',[AuthController::class,'postLogin'])->name('postLogin');

Route::group(['middleware'=>['admin_auth']],function(){
    Route::get('/admin/dashboard',[ProfileController::class,'dashboard'])->name('dashboard');
    Route::get('/admin/users',[UserController::class,'index'])->name('users.index');
    Route::get('/admin/users/register',[UserController::class,'register'])->name('users.register');
    Route::post('/admin/users/store',[UserController::class,'store'])->name('users.store');
    Route::get('/admin/users/edit/{id}',[UserController::class,'edit'])->name('users.edit');
    Route::get('/admin/users/delete/{id}',[UserController::class,'delete'])->name('users.delete');
    Route::post('/admin/users/update/{id}',[UserController::class,'update'])->name('users.update');
    Route::get('/admin/logout',[ProfileController::class,'logout'])->name('logout');
});
