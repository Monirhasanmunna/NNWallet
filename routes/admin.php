<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\NotificationController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['as' => 'notification.', 'prefix' => 'notification'], function () {
        Route::get('/', [NotificationController::class, 'list'])->name('list');
        Route::post('/', [NotificationController::class, 'store'])->name('store');
        Route::delete('/delete/{id}', [NotificationController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'category.', 'prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'list'])->name('list');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::post('/update', [CategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'feature.', 'prefix' => 'feature'], function () {
        Route::get('/', [FeatureController::class, 'list'])->name('list');
        Route::post('/', [FeatureController::class, 'store'])->name('store');
        Route::post('/update', [FeatureController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [FeatureController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'banner.', 'prefix' => 'banner'], function () {
        Route::get('/', [BannerController::class, 'list'])->name('list');
        Route::post('/', [BannerController::class, 'store'])->name('store');
        Route::post('/update', [BannerController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BannerController::class, 'destroy'])->name('delete');
    });
});
