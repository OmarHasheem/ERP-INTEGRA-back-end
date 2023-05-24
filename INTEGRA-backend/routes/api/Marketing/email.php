<?php

use App\Http\Controllers\MarketingControllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::controller(EmailController::class)->group(function () {
    Route::prefix('marketing')->group(function (){
        Route::get('/emails', 'index')->middleware('permission:index email');        
        Route::get('/email/show/{id}', 'show')->middleware('permission:store email');
        Route::post('/email/store', 'store')->middleware('permission:show email');
        Route::put('/email/update/{id}', 'update')->middleware('permission:update email');
        Route::delete('/email/destroy/{id}', 'destroy')->middleware('permission:destroy email');
    });
});