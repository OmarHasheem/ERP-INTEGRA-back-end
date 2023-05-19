<?php

use App\Http\Controllers\RepositoryControllers\ImportController;
use Illuminate\Support\Facades\Route;


Route::controller(ImportController::class)->group(function () {
    Route::prefix('repository')->group(function (){
        Route::get('imports/index', 'index');
        Route::get('import/show/{id}', 'show');
        Route::post('import/store', 'store');
        Route::put('import/update/{id}', 'update');
        Route::delete('import/delete/{id}', 'delete'); 
    });
});
