<?php

use App\Http\Controllers\RepositoryControllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::controller(ProductController::class)->group(function () {
    Route::prefix('repository')->group(function (){
        Route::get('products/index', 'index')->middleware('permission:index product');
        Route::get('product/show/{id}', 'show')->middleware('permission:store product');
        Route::post('product/store', 'store')->middleware('permission:show product');
        Route::put('product/update/{id}', 'update')->middleware('permission:update product');
        Route::delete('product/destroy/{id}', 'destroy')->middleware('permission:desroy product');
    });
});
