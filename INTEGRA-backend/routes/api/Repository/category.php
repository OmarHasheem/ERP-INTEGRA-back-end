<?php

use App\Http\Controllers\RepositoryControllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoryController::class)->group(function () {
    Route::prefix('repository')->group(function (){
        Route::get('categories/index', 'index');
        Route::get('category/show/{id}', 'show');
        Route::post('category/store', 'store');
        Route::put('category/update/{id}', 'update');
        Route::delete('category/destroy/{id}', 'destroy'); 
    });
});

