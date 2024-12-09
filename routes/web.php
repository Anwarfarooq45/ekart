<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\HomepageController;
use Illuminate\Support\Facades\Route;

//Route::withoutMiddleware('is_admin')->group( function () {
    Route::get('/', function () {
        return view('users/home');
    });

    /*Route::name('admin1.')->group(function () {
        Route::get('login', [LoginController::class,'login'])->name('login');
        //Route::get('admin/login', [LoginController::class,'login']);
        Route::post('do-login', [LoginController::class,'dologin'])->name('do.login');
    });

    //Route::get('/main',[HomepageController::class,'main'])->name('main');
});*/