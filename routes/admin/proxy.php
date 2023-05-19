<?php

use App\Http\Controllers\ProxyController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/


Route::middleware('role:admin')
    ->prefix('user/proxy/')
    ->name('user.proxy.')
    ->controller(ProxyController::class)
    ->group(function () {
        Route::get('/history/{start_date?}/{end_date?}', 'index')->name('history');
        Route::get('/history/{id}/edit', 'edit')->name('edit');
        Route::delete('/history/{id}/delete', 'delete')->name('delete');
        
        // Location
        Route::get('/location', 'locationIndex')->name('location.index');
        Route::post('store/location', 'locationStoreOrUpdate')->name('location.storeOrUpdate');
        Route::delete('/location/{id}/delete', 'locationDelete')->name('location.delete');
    });