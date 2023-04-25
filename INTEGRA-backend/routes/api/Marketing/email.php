<?php

use App\Http\Controllers\MarketingControllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::prefix('marketing')->group(function(){
    Route::get('/emails', [EmailController::class, 'index']);
    Route::get('/email/show/{id}', [EmailController::class, 'show']);
    Route::post('/email/store', [EmailController::class, 'store']);
    Route::delete('/email/destroy/{id}', [EmailController::class, 'destroy']);
    Route::put('/email/update/{id}', [EmailController::class, 'update']);


});