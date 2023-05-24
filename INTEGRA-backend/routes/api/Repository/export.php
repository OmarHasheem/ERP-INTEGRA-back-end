<?php

use App\Http\Controllers\RepositoryControllers\ExportController;
use Illuminate\Support\Facades\Route;


Route::controller(ExportController::class)->group(function () {
    Route::prefix('repository')->group(function (){
        Route::get('/exports/index', 'index')->middleware('permission:index export');
        Route::get('/export/show/{id}', 'show')->middleware('permission:store export');
        Route::post('/export/store', 'store')->middleware('permission:show export');
        Route::put('/export/update/{id}', 'update')->middleware('permission:update export');
        Route::delete('/export/delete/{id}', 'delete')->middleware('permission:destroy export');
    });
});
