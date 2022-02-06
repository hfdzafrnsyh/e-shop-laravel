<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\RootController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\OrderProduct\OrderProductController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Cart\CartController;
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

Route::get('/' , [RootController::class , 'index']);
Route::get('/search' , [RootController::class , 'searchProduct']);
Route::get('/allproduct' , [RootController::class , 'productAll']);
Route::get('/product/{product}/detail' , [RootController::class , 'detailProduct']);
Route::post('/product/order' , [RootController::class , 'orderProduct']);
Route::get('/category/{category}/product' , [RootController::class , 'getProductByCategoryId']);

Auth::routes();

Route::group(['middleware' => ['auth','Role:admin']], function(){
    Route::get('/dashboard' , [DashboardController::class , 'index']);


    // users
    Route::get('/users' , [UserController::class , 'index']);
    Route::get('/users/{user}/detail' , [UserController::class , 'detail']);
    Route::get('/users/{user}/edit' , [UserController::class , 'edit']);
    // Route::get('/users/{user}/profile' , [UserController::class , 'profile']);
    Route::put('/users/{user}' , [UserController::class , 'updateUser']);

    // categories
    Route::get('/categories' , [CategoryController::class , 'index']);
    Route::get('/categories/{category}/edit' , [CategoryController::class , 'edit']);
    Route::put('/categories/{category}' , [CategoryController::class , 'update']);

    // product
    Route::get('/products' , [ProductController::class , 'index']);
    Route::post('/products/create' , [ProductController::class , 'create']);
    Route::get('/products/{product}/detail' , [ProductController::class , 'detail']);
    Route::get('/products/{product}/edit' , [ProductController::class , 'edit']);
    Route::put('/products/{product}' , [ProductController::class , 'update']);
    Route::delete('/products/{product}' , [ProductController::class , 'delete']);

    // order
    Route::get('/order' , [OrderProductController::class , 'index']);
    Route::delete('/order/{order}' , [OrderProductController::class , 'delete']);
    Route::get('/order/{order}/detail' , [OrderProductController::class , 'detail']);

    // transaction
    Route::get('/transaction' , [TransactionController::class , 'index']);
    Route::delete('/transaction/{transaction}' , [TransactionController::class , 'delete']);

});


Route::group(['middleware' => ['auth','Role:user']] ,function(){
    Route::post('/comment/create' , [CommentController::class ,'postComment']);

    Route::get('/user/{username}' , [RootController::class , 'userProfile']);
    Route::put('/user/{username}' , [RootController::class , 'updateProfile']);
    Route::get('/user/{username}/password' , [RootController::class , 'password']);
    Route::patch('/user/{username}' , [RootController::class , 'updatePassword']);

    Route::get('/user/{username}/cart' , [CartController::class , 'cartByUser']);
    Route::post('/product/cart/create' , [CartController::class , 'addToCart']);
    Route::delete('/product/cart/order/{product}' , [CartController::class , 'orderProductByCart']);
    Route::delete('/product/cart/{product}' , [CartController::class , 'delete']);

});