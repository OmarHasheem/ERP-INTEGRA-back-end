<?php

use App\Http\Controllers\RepositoryControllers\ProductAttributes\AttributeController;
use Illuminate\Support\Facades\Route;


Route::controller(AttributeController::class)->group(function () {
    Route::prefix('repository/products')->group(function (){
        Route::get('/attributes/{id}', 'show');
        Route::get('/attributes', 'index');
        Route::post('/attributes', 'store');
        Route::put('/attributes/{id}', 'update');
        Route::delete('/attributes/{id}', 'destroy');
    });
});
