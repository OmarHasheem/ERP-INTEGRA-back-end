<?php

use App\Http\Controllers\RepositoryControllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoryController::class)->group(function () {
    Route::prefix('repository')->group(function (){
        // Route::get('/categories', 'index')->middleware('permission:index category');        
        // Route::get('/category/show/{id}', 'show')->middleware('permission:store category');
        // Route::post('/category/store', 'store')->middleware('permission:show category');
        // Route::put('/category/update/{id}', 'update')->middleware('permission:update category');
        // Route::delete('/category/destroy/{id}', 'destroy')->middleware('permission:destroy category');


        Route::get('/categories', 'index');        
        Route::get('/category/show/{id}', 'show');
        Route::post('/category/store', 'store');
        Route::put('/category/update/{id}', 'update');
        Route::delete('/category/destroy/{id}', 'destroy');
    });
});

