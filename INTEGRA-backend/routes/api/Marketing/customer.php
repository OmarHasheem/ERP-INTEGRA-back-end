<?php

use App\Http\Controllers\MarketingControllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::controller(CustomerController::class)->group(function () {
    Route::prefix('marketing')->group(function (){
        Route::get('/customers', 'index')->middleware('permission:index customer');        
        Route::get('/customer/show/{id}', 'show')->middleware('permission:store customer');
        Route::post('/customer/store', 'store')->middleware('permission:show customer');
        Route::put('/customer/update/{id}', 'update')->middleware('permission:update customer');
        Route::delete('/customer/destroy/{id}', 'destroy')->middleware('permission:destroy customer');
    });
});
