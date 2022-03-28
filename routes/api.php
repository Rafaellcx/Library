<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\RentDetailsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BookController;

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

Route::namespace ('Api')->group(function () {
    Route::get("healthcheck", function () {
        return "OK";
    });
    Route::prefix('book')->group(function () {
        Route::get('all', [BookController::class, 'index']);
        Route::get('find/{id}', [BookController::class, 'show']);
        Route::post('store', [BookController::class, 'store']);
        Route::put('update/{id}', [BookController::class, 'update']);
        Route::delete('delete/{id}', [BookController::class, 'destroy']);
    });

    Route::prefix('category')->group(function () {
        Route::get('all', [CategoryController::class, 'index']);
        Route::get('find/{id}', [CategoryController::class, 'show']);
        Route::post('store', [CategoryController::class, 'store']);
        Route::put('update/{id}', [CategoryController::class, 'update']);
        Route::delete('delete/{id}', [CategoryController::class, 'destroy']);
    });

    Route::prefix('client')->group(function () {
        Route::get('all', [ClientController::class, 'index']);
        Route::get('find/{id}', [ClientController::class, 'show']);
        Route::post('store', [ClientController::class, 'store']);
        Route::put('update/{id}', [ClientController::class, 'update']);
        Route::delete('delete/{id}', [ClientController::class, 'destroy']);
    });

    Route::prefix('rent')->group(function () {
        Route::get('all', [RentController::class, 'index']);
        Route::get('find/{id}', [RentController::class, 'show']);
        Route::post('store', [RentController::class, 'store']);
        Route::put('update/{id}', [RentController::class, 'update']);
        Route::delete('delete/{id}', [RentController::class, 'destroy']);
        Route::put('close/{id}', [RentController::class, 'close']);
    });

    Route::prefix('rent_detail')->group(function () {
        Route::get('all', [RentDetailsController::class, 'index']);
        Route::get('find/{id}', [RentDetailsController::class, 'show']);
        Route::post('add', [RentDetailsController::class, 'store']);
        Route::delete('remove/{id}', [RentDetailsController::class, 'destroy']);
    });

});
