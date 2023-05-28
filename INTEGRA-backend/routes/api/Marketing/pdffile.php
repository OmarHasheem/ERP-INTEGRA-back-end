<?php

use App\Http\Controllers\MarketingControllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::controller(PDFController::class)->group(function () {
    Route::prefix('marketing')->group(function (){
        // Route::get('/pdfs', 'index')->middleware('permission:index pdf');        
        // Route::get('/pdf/show/{id}', 'show')->middleware('permission:store pdf');
        // Route::post('/pdf/store', 'store')->middleware('permission:show pdf');
        // Route::delete('/pdf/destroy/{id}', 'destroy')->middleware('permission:destroy pdf');

        Route::get('/pdfs', 'index');        
        Route::get('/pdf/show/{id}', 'show');
        Route::post('/pdf/store/{id}', 'store');
        Route::delete('/pdf/destroy/{id}', 'destroy');
    });
});
