<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('company', \App\Http\Controllers\CompanyController::class);
Route::apiResource('bank', \App\Http\Controllers\BankController::class)->only('index', 'show');

Route::middleware([\Stancl\Tenancy\Middleware\InitializeTenancyByRequestData::class])->group(function () {

    Route::apiResource('user', \App\Http\Controllers\UserController::class);
    Route::apiResource('client', \App\Http\Controllers\ClientController::class);
    Route::apiResource('supplier', \App\Http\Controllers\SupplierController::class);
    Route::apiResource('category', \App\Http\Controllers\CategoryController::class);
    Route::apiResource('product', \App\Http\Controllers\ProductController::class);
    Route::apiResource('productimage', \App\Http\Controllers\ProductImageController::class)->only('store', 'destroy');
    Route::apiResource('variation', \App\Http\Controllers\VariationController::class);
    Route::apiResource('variationitem', \App\Http\Controllers\VariationItemController::class)->only('store', 'update', 'destroy');
    Route::apiResource('bankaccount', \App\Http\Controllers\BankAccountController::class)->except('index');

});
