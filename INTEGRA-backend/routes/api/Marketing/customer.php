<?php

use App\Http\Controllers\MarketingControllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::controller(CustomerController::class)->group(function () {
    Route::prefix('marketing')->group(function (){
        // Route::get('/customers/{id}', 'show')->middleware('permission:show customer');
        // Route::get('/customers', 'index')->middleware('permission:index customer');        
        // Route::post('/customers', 'store')->middleware('permission:store customer');
        // Route::put('/customers/{id}', 'update')->middleware('permission:update customer');
        // Route::delete('/customers/{id}', 'destroy')->middleware('permission:destroy customer');

        Route::get('/customers/{id}', 'show');
        Route::get('/customers', 'index');        
        Route::post('/customers', 'store');
        Route::put('/customers/{id}', 'update');
        Route::delete('/customers/{id}', 'destroy');
    });
});
