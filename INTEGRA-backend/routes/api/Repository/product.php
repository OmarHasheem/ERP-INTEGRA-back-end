<?php

use App\Http\Controllers\RepositoryControllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::controller(ProductController::class)->group(function () {
    Route::prefix('repository')->group(function (){
        Route::get('products/index', 'index');
        Route::get('product/show/{id}', 'show');
        Route::post('product/store', 'store');
        Route::put('product/update/{id}', 'update');
        Route::delete('product/destroy/{id}', 'destroy'); 
    });
});
