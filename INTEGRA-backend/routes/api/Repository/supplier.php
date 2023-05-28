<?php

use App\Http\Controllers\RepositoryControllers\SupplierController;
use Illuminate\Support\Facades\Route;


Route::controller(SupplierController::class)->group(function () {
    Route::prefix('repository')->group(function (){
        // Route::get('suppliers', 'index')->middleware('permission:index supplier');
        // Route::get('supplier/show/{id}', 'show')->middleware('permission:store supplier');
        // Route::post('supplier/store', 'store')->middleware('permission:show supplier');
        // Route::put('supplier/update/{id}', 'update')->middleware('permission:update supplier');
        // Route::delete('supplier/destroy/{id}', 'destroy')->middleware('permission:destroy supplier');
   
        Route::get('suppliers', 'index');
        Route::get('supplier/show/{id}', 'show');
        Route::post('supplier/store', 'store');
        Route::put('supplier/update/{id}', 'update');
        Route::delete('supplier/destroy/{id}', 'destroy');
   
    });
});
