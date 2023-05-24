<?php

use App\Http\Controllers\HRControllers\EmployeePerformanceController;
use Illuminate\Support\Facades\Route;

Route::controller(EmployeePerformanceController::class)->group(function () {
    Route::prefix('HR')->group(function (){
        Route::get('/employeePerformances', 'index')->middleware('permission:index employeePerformance');        
        Route::get('/employeePerformance/show/{id}', 'show')->middleware('permission:store employeePerformance');
        Route::post('/employeePerformance/store', 'store')->middleware('permission:show employeePerformance');
        Route::put('/employeePerformance/update/{id}', 'update')->middleware('permission:update employeePerformance');
        Route::delete('/employeePerformance/destroy/{id}', 'destroy')->middleware('permission:destroy employeePerformance');
    });
});


