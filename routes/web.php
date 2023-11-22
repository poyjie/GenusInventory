<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Middleware\CheckUserLogin;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\addproductsController;
use App\Http\Controllers\addcustomersController;
use App\Http\Controllers\stockinController;
use App\Http\Controllers\salesController;
use App\Http\Controllers\PDFExportController;
use App\Http\Controllers\HomeController;
use App\Models\Products;

Route::middleware(['guest:web', 'prevent.back.history'])->group(function () {
    Route::get('/home', function () {
        return view('customer.pages.index');
    })->name('mainpage');

    Route::get('/login', [CustomAuthController::class, 'index_logincustomer'])->name('userlogin');
    // Route::get('/login', [CustomAuthController::class, 'index_loginadmin'])->name('loginadmin');
    Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
});


Route::middleware(['auth:web','prevent.back.history','check.user.login'])->group(function(){

    Route::get('/', [CustomAuthController::class, 'dashboard'])->name('check.page');

    Route::get('/customer', [CustomAuthController::class, 'dashboard'])->name('check.page');

    Route::get('/admin', [CustomAuthController::class, 'dashboard'])->name('check.page');


    Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout');


    //MENU ADMIN
    Route::get('/admin/addcustomer', function () {
        return view('admin.pages.customer_profile.addcustomer');
    })->name('addcustomer.page');

    Route::get('/admin/addproduct', function () {
        return view('admin.pages.index');
    })->name('addproduct.page');

    Route::get('/admin/addproduct', function () {
        return view('admin.pages.product_management.addproduct_page');
    })->name('addproduct.page');

    Route::get('/admin/stockin', function () {
        return view('admin.pages.inventory.stockin');
    })->name('stockin.page');

    Route::get('/admin/transferofstocks', function () {
        return view('admin.pages.inventory.transferofstocks');
    })->name('transferofstocks.page');

    //FORMS
    Route::post('/admin/addproduct/storeproduct', [addproductsController::class, 'store'])->name('addproducts.store');
    Route::post('/admin/addcustomers/storecustomer', [addcustomersController::class, 'store'])->name('addcustomers.store');
    Route::post('/admin/stockin/storestockin', [stockinController::class, 'store'])->name('stockin.store');

    //DISPLAYS
    Route::get('/admin/addproduct/getproducts', [addproductsController::class, 'GetProducts'])->name('addproducts.getproducts');
    Route::get('/admin/addcustomers/getcustomers', [addcustomersController::class, 'GetCustomers'])->name('addcustomers.getcustomers');
    Route::get('/admin/stockin/allstocks', [stockinController::class, 'GetAllStocks'])->name('stockin.GetAllStocks');
    Route::get('/admin/stockin/GetStocksInRecords', [stockinController::class, 'GetStocksInRecords'])->name('stockin.GetStocksInRecords');
    Route::get('/admin/transferofstocks/GetProductPerbranch/{branchname}', [stockinController::class, 'GetProductPerbranch'])->name('stockin.GetProductPerbranch');
    
    
});

Route::get('/admin/addproduct/getproducts/cashier/{branchname}', [addproductsController::class, 'GetProductsCashier'])->name('addproducts.getproducts.cashier');
Route::get('/admin/addproduct/getproducts/cashier/{branchname}/{sku}', [addproductsController::class, 'GetSingleProductsCashier'])->name('addproducts.getsingleproducts.cashier');

Route::post('/cashier/storesales', [salesController::class, 'store'])->name('cashier.storesales');
Route::post('/cashier/store_transaction_cash', [salesController::class, 'TransactCash'])->name('cashier.TransactCash');
Route::get('/cashier/GetTransactionNum/{branchname}/{cashiernum}', [salesController::class, 'GetTransactionNum'])->name('cashier.GetTransactionNum');
Route::get('/cashier/AddTranscationNumber/{branchname}/{cashiernum}', [salesController::class, 'AddTranscationNumber'])->name('cashier.AddTranscationNumber');


//MENU MAIN PAGE
Route::get('/shop', [HomeController::class, 'index'])->name('shop.page');
Route::get('/shop/{id}', [HomeController::class, 'productsingle'])->name('shope.single');


//PDF REPORT
Route::get('/myproducts', [PDFExportController::class, 'pdproductbarcode'])->name('pdf.products');
// Route::get('/myproducts', function () {
//     return view('admin.reports.allproducts');
// })->name('pdf.products');