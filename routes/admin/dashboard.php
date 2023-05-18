<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/


Route::middleware('role:admin')
    ->get('/user/dashboard', [DashboardController::class, 'index'])
    ->name('user.dashboard');