<?php

use App\Http\Controllers\MarketingControllers\CustomerController;
use Illuminate\Support\Facades\Route;


Route::prefix('marketing')->group(function(){
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customer/show/{id}', [CustomerController::class, 'show']);
    Route::post('/customer/store', [CustomerController::class, 'store']);
    Route::delete('/customer/destroy/{id}', [CustomerController::class, 'destroy']);
    Route::put('/customer/update/{id}', [CustomerController::class, 'update']);
     

});