<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExtensionSyncController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FeatureListController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'extension-sync'], function () {
    Route::get('/', [ExtensionSyncController::class, 'index']);
    Route::post('/', [ExtensionSyncController::class, 'store']);
});

Route::group(['prefix' => 'banner'], function () {
    Route::get('/', [BannerController::class, 'index']);
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategoryController::class, 'index']);
});

Route::group(['prefix' => 'feature-list'], function () {
    Route::get('/', [FeatureListController::class, 'index']);
});