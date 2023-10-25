<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Middleware\CheckUserLogin;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\addproductsController;
use App\Http\Controllers\addcustomersController;

use App\Http\Controllers\salesController;
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
    Route::get('/admin/addcustomer', function () {
        return view('admin.pages.customer_profile.addcustomer');
    })->name('addcustomer.page');

    Route::get('/admin/addproduct', function () {
        return view('admin.pages.index');
    })->name('addproduct.page');

    Route::get('/admin/addproduct', function () {
        return view('admin.pages.product_management.addproduct_page');
    })->name('addproduct.page');

    //FORMS
    Route::post('/admin/addproduct/storeproduct', [addproductsController::class, 'store'])->name('addproducts.store');
    Route::post('/admin/addcustomers/storecustomer', [addcustomersController::class, 'store'])->name('addcustomers.store');

    //DISPLAYS
    Route::get('/admin/addproduct/getproducts', [addproductsController::class, 'GetProducts'])->name('addproducts.getproducts');
    Route::get('/admin/addcustomers/getcustomers', [addcustomersController::class, 'GetCustomers'])->name('addcustomers.getcustomers');


});
Route::post('/admin/addcustomers/storecustomer', [addcustomersController::class, 'store'])->name('addcustomers.store');

Route::get('/admin/addproduct/getproducts/cashier', [addproductsController::class, 'GetProductsCashier'])->name('addproducts.getproducts.cashier');
Route::post('/cashier/storesales', [salesController::class, 'store'])->name('cashier.storesales');
