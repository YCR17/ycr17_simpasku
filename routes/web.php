<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SandBoxController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\StaffController;
use App\Http\Controllers\Dashboard\PasienController;
use App\Http\Controllers\Dashboard\AccountController;

Route::get('/', function () {
    return redirect('auth/login');
});


Route::get('/sandbox', [SandBoxController::class, 'index']);

Route::middleware('web.auth.user')->group(function (){
    Route::prefix('dashboard')->group(function () {
        //Arahkan url dashboard ke dashboard/home
        Route::get('/', [HomeController::class, 'index']);
        // Route::get('/', function() {
        //     return redirect(url('dashboard/home'));
        // });
        Route::get('home', [HomeController::class, 'index']);
        Route::prefix('pasien')->group(function() {
            Route::get('/', [PasienController::class, 'index']);
            Route::get('create', [PasienController::class, 'create']);
            Route::post('create', [PasienController::class, 'post_create']);
            Route::get('{id}', [PasienController::class, 'edit']);
            Route::post('{id}', [PasienController::class, 'post_edit']);
            Route::post('delete', [PasienController::class, 'delete']);
        });
        Route::prefix('account')->group(function() {
            Route::get('/', [AccountController::class, 'edit']);
            Route::post('/', [AccountController::class, 'post_edit']);
        });
        Route::middleware('web.access.onlyrole:admin')->group(function () {
            Route::prefix('staff')->group(function() {
                Route::get('/', [StaffController::class, 'index']);
                Route::get('create', [StaffController::class, 'create']);
                Route::post('create', [StaffController::class, 'post_create']);
                Route::get('{id}', [StaffController::class, 'detail']);
                Route::get('{id}/edit', [StaffController::class, 'edit']);
                Route::post('{id}/edit', [StaffController::class, 'post_edit']);
                Route::post('delete', [StaffController::class, 'delete']);
            });
    
        });
    });
});

Route::prefix('auth')->group(function (){
    Route::middleware('web.auth.guest')->group(function (){
        Route::get( 'login', [LoginController::class, 'login'])->name('web.auth.login');
        Route::post( 'login', [LoginController::class, 'post_login']);
        Route::get( 'register', [RegisterController::class, 'register']);
        Route::post( 'register', [RegisterController::class, 'post_register']);
    });

    Route::middleware('web.auth.user')->group(function () {
        Route::get('logout', [LogoutController::class, 'logout']);
    });
});