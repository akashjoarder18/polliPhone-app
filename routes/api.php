<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\Api\{ApiAuthController,ApiListOfOuteletController,ApiMarketingExecutiveController};

Route::post('/login',[ApiAuthController::class,'login'])->name('api.login');
Route::post('/logout',[ApiAuthController::class,'logout'])->name('api.logout');

Route::get('/outlets',[ApiListOfOuteletController::class,'index']);
Route::get('/products',[ApiListOfOuteletController::class,'productList']);
Route::get('/campaigns',[ApiListOfOuteletController::class,'campaignList']);
Route::post('/visits',[ApiMarketingExecutiveController::class,'createVisit']);
Route::get('/occasions',[ApiMarketingExecutiveController::class,'occasionList']);
Route::post('/psales',[ApiMarketingExecutiveController::class,'productSale']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
