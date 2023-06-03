<?php

use App\Http\Controllers\RepositoryControllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::controller(ProductController::class)->group(function () {
    Route::prefix('repository')->group(function (){
        // Route::get('/products/{id}', 'show')->middleware('permission:show product');
        // Route::get('/products', 'index')->middleware('permission:index product');
        // Route::post('/products', 'store')->middleware('permission:store product');
        // Route::put('/products/{id}', 'update')->middleware('permission:update product');
        // Route::delete('/products/{id}', 'destroy')->middleware('permission:destroy product');

        Route::get('/products/{id}', 'show');
        Route::get('/products', 'index');
        Route::post('/products', 'store');
        Route::put('/products/{id}', 'update');
        Route::delete('/products/{id}', 'destroy');
    });
});
