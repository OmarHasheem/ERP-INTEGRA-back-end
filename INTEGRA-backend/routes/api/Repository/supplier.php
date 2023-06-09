<?php

use App\Http\Controllers\RepositoryControllers\SupplierController;
use Illuminate\Support\Facades\Route;


Route::controller(SupplierController::class)->group(function () {
    Route::prefix('repository')->group(function (){
        // Route::get('/suppliers/{id}', 'show')->middleware('permission:show supplier');
        // Route::get('/suppliers', 'index')->middleware('permission:index supplier');
        // Route::post('/suppliers', 'store')->middleware('permission:show supplier');
        // Route::put('/suppliers/{id}', 'update')->middleware('permission:update supplier');
        // Route::delete('/suppliers/{id}', 'destroy')->middleware('permission:destroy supplier');

        Route::get('/suppliers/{id}', 'show');
        Route::get('/suppliers', 'index');
        Route::post('/suppliers', 'store');
        Route::put('/suppliers/{id}', 'update');
        Route::delete('/suppliers/{id}', 'destroy');
   
        Route::get('/suppliers/products/{id}', 'getProductsBySupplier');
    });
});
