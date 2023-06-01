<?php

use App\Http\Controllers\RepositoryControllers\ProductAttributes\AttributeValueController;
use Illuminate\Support\Facades\Route;


Route::controller(AttributeValueController::class)->group(function () {
    Route::prefix('repository/products')->group(function (){
        Route::get('attributeValues/{id}', 'show');
        Route::get('attributeValues', 'index');
        Route::post('attributeValues', 'store');
        Route::put('attributeValues/{id}', 'update');
        Route::delete('attributeValues/{id}', 'destroy');
    });
});