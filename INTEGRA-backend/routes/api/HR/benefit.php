<?php

use App\Http\Controllers\HRControllers\BenefitController;
use Illuminate\Support\Facades\Route;


Route::controller(BenefitController::class)->group(function () {
    Route::prefix('HR')->group(function (){
        Route::get('/benefits', 'index')->middleware('permission:index benefit');        
        Route::get('/benefit/show/{id}', 'show')->middleware('permission:store benefit');
        Route::post('/benefit/store', 'store')->middleware('permission:show benefit');
        Route::put('/benefit/update/{id}', 'update')->middleware('permission:update benefit');
        Route::delete('/benefit/destroy/{id}', 'destroy')->middleware('permission:destroy benefit');
    });
});

