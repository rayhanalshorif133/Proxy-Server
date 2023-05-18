<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProxyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Auth\EmailVerificationRequest;




Route::get('proxy-get-set', [ProxyController::class,"getProxyAndSetProxy"])
        ->name('getProxyAndSetProxy');
Route::get('proxy-refresh', [ProxyController::class,"refreshProxy"])
        ->name('refreshProxy');

Route::get("/cmd",function(){
    // Artisan::call('make:controller', ['name' => 'MailController']);
    // Artisan::call('make:model', ['name' => 'StoreProxy']);
    // Artisan::call('make:migration', ['name' => 'create_store_proxys_table']);
  

    // Artisan::call('schedule:run');
    // Artisan::call('task:proxy');
    // Artisan::call('migrate:rollback --step=1');
    Artisan::call('migrate:fresh');
    $proxyController = new ProxyController();
    $proxyController->getProxyAndSetProxy();
    // Artisan::call('cache:clear');
    dd("done");
    // php artisan make:model sale -mcr
    return redirect()->route('user.dashboard');
});


Route::get('/', function () {
    if (Auth::check()) {
        $role = Auth::user()->roles[0]->name;
        if ($role == 'user') {
            return redirect()->route('user.home');
        } else {
            return redirect()->route('user.dashboard');
        }
    } else {
        return redirect()->route('user.login');
    }
});

// homepage
Route::middleware(['auth','verified'])->get('/home', [HomeController::class, 'home'])->name('user.home');





Route::middleware('guest')
    ->name('user.')
    ->group(function () {
        Route::get('/user/login', [AuthController::class, 'userLoginView'])->name('login');
        Route::get('/user/register', [AuthController::class, 'userRegisterView'])->name('register');
        Route::post('/user/login', [AuthController::class, 'userLogin'])->name('login');
        Route::post('/user/register', [AuthController::class, 'userRegister'])->name('register');
    });

Route::middleware('role:admin|user')
    ->get('/user/logout', [AuthController::class, 'userLogout'])->name('user.logout');


foreach (glob(base_path('routes/admin/*.php')) as $route) {
    require_once $route;
}


// Public Routes in web
foreach (glob(base_path('routes/web/*.php')) as $route) {
    require_once $route;
}
