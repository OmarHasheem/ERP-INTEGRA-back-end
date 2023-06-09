<?php

use App\Http\Controllers\RepositoryControllers\ProductAttributes\AttributeGroupController;
use Illuminate\Support\Facades\Route;


Route::controller(AttributeGroupController::class)->group(function () {
    Route::prefix('repository/products')->group(function (){
        Route::get('attributeGroups/{id}', 'show');
        Route::get('attributeGroups', 'index');
        Route::post('attributeGroups', 'store');
        Route::put('attributeGroups/{id}', 'update');
        Route::delete('attributeGroups/{id}', 'destroy');
        Route::get('attributeGroups/attributesOfGroup/{id}', 'getAttributesByGroup');

    });
});