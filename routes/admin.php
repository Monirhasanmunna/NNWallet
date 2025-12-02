<?php

use App\Http\Controllers\Admin\NotificationController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['as' => 'notification.', 'prefix' => 'notification'], function () {
        Route::get('/', [NotificationController::class, 'list'])->name('list');
        Route::post('/', [NotificationController::class, 'store'])->name('store');
        Route::delete('/delete/{id}', [NotificationController::class, 'destroy'])->name('delete');
    });
});
