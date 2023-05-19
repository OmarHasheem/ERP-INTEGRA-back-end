<?php

use App\Http\Controllers\MarketingControllers\EmailController;
use Illuminate\Support\Facades\Route;


Route::prefix('marketing')->group(function(){
    Route::get('/emails', [EmailController::class, 'index'])->middleware('permission:index email');
    Route::get('/email/show/{id}', [EmailController::class, 'show'])->middleware('permission:show email');
    Route::post('/email/store', [EmailController::class, 'store'])->middleware('permission:store email');
    Route::delete('/email/destroy/{id}', [EmailController::class, 'destroy'])->middleware('permission:destroy email');
    Route::put('/email/update/{id}', [EmailController::class, 'update'])->middleware('permission:update email');


});