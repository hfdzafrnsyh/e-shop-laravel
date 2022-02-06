<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ApiProductController;
use App\Http\Controllers\Auth\ApiAuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login' , [ApiAuthController::class , 'login']);
Route::post('/register' , [ApiAuthController::class , 'register']);

Route::get('/product' , [ApiProductController::class , 'index']);

Route::group(['middleware' => 'auth:api'] , function(){
   
    Route::post('/logout' , [ApiAuthController::class , 'logout']);

    Route::post('/product/create' , [ApiProductController::class , 'create']);
    Route::get('/product/{product}/detail' , [ApiProductController::class , 'detail']);
    Route::put('/product/{product}' , [ApiProductController::class , 'edit']);
    Route::delete('/product/{product}' , [ApiProductController::class , 'delete']);
});
