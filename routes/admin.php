<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Middleware\CheckAdminLoggedInOrNot;
use Illuminate\Support\Facades\Route;


  
  
  Route::name('admin.')->group(function () {
      Route::get('login', [LoginController::class,'login'])->name('login');
      //Route::get('admin/login', [LoginController::class,'login']);
      Route::post('do-login', [LoginController::class,'dologin'])->name('do.login');

      
  Route::middleware('auth:admin')->group(function () {  
    Route::get('dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('logout', [LoginController::class,'logout'])->name('logout');
    
    Route::get('products', [ProductController::class,'list'])->name('product.list');
    Route::get('products.create', [ProductController::class,'create'])->name('product.create');
    Route::post('products.save', [ProductController::class,'save'])->name('product.save');

    Route::get('products.delete/{id}', [ProductController::class,'delete'])->name('product.delete');
    Route::get('products.edit/{id}', [ProductController::class,'edit'])->name('product.edit');
    Route::post('products.update', [ProductController::class,'update'])->name('product.update');
  });

});
