<?php

use App\Http\Controllers\HRControllers\EmployeePerformanceController;
use Illuminate\Support\Facades\Route;


Route::prefix('HR')->group(function (){
    Route::get('/employeePerformances', [EmployeePerformanceController ::class, 'index'])->middleware('can:index campaign');
    Route::get('/employeePerformance/show/{id}', [EmployeePerformanceController::class, 'show'])->middleware('can:index campaign');

    Route::post('/employeePerformance/store', [EmployeePerformanceController::class, 'store'])->middleware('can:index campaign');
    Route::put('/employeePerformance/update/{id}', [EmployeePerformanceController::class, 'update'])->middleware('can:index campaign');
    Route::delete('/employeePerformance/destroy/{id}', [EmployeePerformanceController::class, 'destroy'])->middleware('can:index campaign');
});
