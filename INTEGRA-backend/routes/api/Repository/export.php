<?php

use App\Http\Controllers\RepositoryControllers\ExportController;
use Illuminate\Support\Facades\Route;


Route::controller(ExportController::class)->group(function () {
    Route::prefix('repository')->group(function (){
        Route::get('exports/index', 'index');
        Route::get('export/show/{id}', 'show');
        Route::post('export/store', 'store');
        Route::put('export/update/{id}', 'update');
        Route::delete('export/delete/{id}', 'delete'); 
    });
});
