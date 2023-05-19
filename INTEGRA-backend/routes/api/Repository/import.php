<?php

use App\Http\Controllers\RepositoryControllers\ImportController;
use Illuminate\Support\Facades\Route;


Route::controller(ImportController::class)->group(function () {
    Route::prefix('repository')->group(function (){
        Route::get('imports/index', 'index')->middleware('permission:index import');
        Route::get('import/show/{id}', 'show')->middleware('permission:store import');
        Route::post('import/store', 'store')->middleware('permission:show import');
        Route::put('import/update/{id}', 'update')->middleware('permission:update import');
        Route::delete('import/delete/{id}', 'delete')->middleware('permission:destroy import');
    });
});
