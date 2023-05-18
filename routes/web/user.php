<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProxyController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Auth API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('role:admin|user')
    ->name('user.')
    ->group(function () {
        Route::get('profile/{id}', [UserController::class, 'profile'])->name('profile');
        Route::get('profile/{id}/edit', [UserController::class, 'profileEdit'])->name('profile.edit');
        Route::post('profile/update', [UserController::class, 'profileUpdate'])->name('profile.update');
        Route::get('history', [ProxyController::class, 'history'])->name('history');

        // proxy routes
        Route::post('proxy/get', [ProxyController::class, 'getProxyByCountry'])->name('getProxyByCountry');
        Route::post('proxy/store', [ProxyController::class, 'storeProxy'])->name('storeProxy');
        Route::get('proxy/check-per-day', [ProxyController::class, 'checkProxy'])->name('checkProxy');


    });
