<?php

use App\Http\Controllers\MarketingControllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::controller(EmailController::class)->group(function () {
    Route::prefix('marketing')->group(function (){
        // Route::get('/emails/{id}', 'show')->middleware('permission:show email');
        // Route::get('/emails', 'index')->middleware('permission:index email');        
        // Route::post('/email', 'store')->middleware('permission:store email');
        // Route::put('/email/{id}', 'update')->middleware('permission:update email');
        // Route::delete('/email/{id}', 'destroy')->middleware('permission:destroy email');

        Route::get('/emails/{id}', 'show');
        Route::get('/emails', 'index');        
        Route::post('/email', 'store');
        Route::put('/email/{id}', 'update');
        Route::delete('/email/{id}', 'destroy');
    });
});