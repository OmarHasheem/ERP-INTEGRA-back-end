<?php

use App\Http\Controllers\RepositoryControllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoryController::class)->group(function () {
    Route::prefix('repository')->group(function (){
        Route::get('categories/index', 'index')->middleware('permission:index catagory');        
        Route::get('category/show/{id}', 'show')->middleware('permission:store catagory');
        Route::post('category/store', 'store')->middleware('permission:show catagory');
        Route::put('category/update/{id}', 'update')->middleware('permission:update catagory');
        Route::delete('category/destroy/{id}', 'destroy')->middleware('permission:destroy catagory');
    });
});

