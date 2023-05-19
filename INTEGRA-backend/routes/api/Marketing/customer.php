<?php

use App\Http\Controllers\MarketingControllers\CustomerController;
use Illuminate\Support\Facades\Route;



Route::prefix('marketing')->group(function(){
    Route::get('/customers', [CustomerController::class, 'index'])->middleware('permission:index customer');
    Route::get('/customer/show/{id}', [CustomerController::class, 'show'])->middleware('permission:show customer');
    Route::post('/customer/store', [CustomerController::class, 'store'])->middleware('permission:store customer');
    Route::delete('/customer/destroy/{id}', [CustomerController::class, 'destroy'])->middleware('permission:destroy customer');
    Route::put('/customer/update/{id}', [CustomerController::class, 'update'])->middleware('permission:update customer');
     

});