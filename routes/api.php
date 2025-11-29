<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExtensionSyncController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'extension-sync'], function () {
    Route::get('/', [ExtensionSyncController::class, 'index']);
    Route::post('/', [ExtensionSyncController::class, 'store']);
});
