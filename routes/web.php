<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Middleware\CheckUserLogin;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\addproductsController;

Route::middleware(['guest:web', 'prevent.back.history'])->group(function () {

    Route::get('/', [CustomAuthController::class, 'index'])->name('login');
    Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
});


Route::middleware(['auth:web','prevent.back.history','check.user.login'])->group(function(){

    Route::get('/admin', function () {
        return view('admin.pages.index');
    });
    Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout');

    Route::get('/admin', [CustomAuthController::class, 'dashboard'])->name('admin.page');

    //MENU
    Route::get('/admin/addproduct', function () {
        return view('admin.pages.product_management.addproduct_page');
    })->name('addproduct.page');

    //FORMS
    Route::post('/admin/addproduct/storeproduct', [addproductsController::class, 'store'])->name('addproducts.store');

    //DISPLAYS
    Route::get('/admin/addproduct/getproducts', [addproductsController::class, 'GetProducts'])->name('addproducts.getproducts');


});
