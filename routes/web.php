<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Middleware\CheckUserLogin;
use App\Http\Middleware\PreventBackHistory;


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

    //PRODUCT MANAGEMENT
    Route::get('/admin/addproduct', function () {
        return view('admin.pages.product_management.addproduct_page');
    })->name('addproduct.page');



});


// Route::get('dashboard/forelease', [ForCustodianController::class, 'ShowPage'])->name('sideNavPageForRelease');
