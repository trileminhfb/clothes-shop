<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'role'], function () {
    Route::get('/', [RoleController::class, 'getData']);
    Route::post('/', [RoleController::class, 'createData']);
    Route::put('/', [RoleController::class, 'updateData']);
    Route::delete('/{id}', [RoleController::class, 'deleteData']);
});

Route::group(['prefix' => 'payment'], function () {
    Route::get('/', [PaymentController::class, 'getData']);
    Route::post('/', [PaymentController::class, 'createData']);
    Route::put('/', [PaymentController::class, 'updateData']);
    Route::delete('/{id}', [PaymentController::class, 'deleteData']);
});

Route::group(['prefix' => 'brand'], function () {
    Route::get('/', [BrandController::class, 'getData']);
    Route::post('/', [BrandController::class, 'createData']);
    Route::put('/', [BrandController::class, 'updateData']);
    Route::delete('/{id}', [BrandController::class, 'deleteData']);
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategoryController::class, 'getData']);
    Route::post('/', [CategoryController::class, 'createData']);
    Route::put('/', [CategoryController::class, 'updateData']);
    Route::delete('/{id}', [CategoryController::class, 'deleteData']);
});

Route::group(['prefix' => 'warehouse'], function () {
    Route::get('/', [WarehouseController::class, 'getData']);
    Route::post('/', [WarehouseController::class, 'createData']);
    Route::put('/', [WarehouseController::class, 'updateData']);
    Route::delete('/{id}', [WarehouseController::class, 'deleteData']);
});

Route::group(['prefix' => 'product'], function () {
    Route::get('/', [ProductController::class, 'getData']);
    Route::post('/', [ProductController::class, 'createData']);
    Route::put('/', [ProductController::class, 'updateData']);
    Route::delete('/{id}', [ProductController::class, 'deleteData']);
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'getData']);
    Route::post('/', [UserController::class, 'createData']);
    Route::put('/', [UserController::class, 'updateData']);
    Route::delete('/{id}', [UserController::class, 'deleteData']);
});

Route::group(['prefix' => 'cart'], function () {
    Route::get('/{id_user}', [CartController::class, 'getData']);
    Route::post('/', [CartController::class, 'createData']);
    Route::put('/', [CartController::class, 'updateData']);
    Route::delete('/{id}', [CartController::class, 'deleteData']);
    Route::delete('/user/{id_user}', [CartController::class, 'deleteAllFromTable']);
});
