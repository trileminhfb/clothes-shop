<?php

use App\Http\Controllers\RoleController;
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
