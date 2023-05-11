<?php

use App\Http\Controllers\RepositoryControllers\SupplierController;
use Illuminate\Support\Facades\Route;


Route::controller(SupplierController::class)->group(function () {
    Route::prefix('repository')->group(function (){
        Route::get('suppliers/index', 'index');
        Route::get('supplier/show/{id}', 'show');
        Route::post('supplier/store', 'store');
        Route::put('supplier/update/{id}', 'update');
        Route::delete('supplier/destroy/{id}', 'destroy'); 
    });
});
