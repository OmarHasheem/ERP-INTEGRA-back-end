<?php

use App\Http\Controllers\HRControllers\EmployeePerformanceController;
use Illuminate\Support\Facades\Route;


Route::prefix('HR')->group(function (){
    Route::get('/employeePerformances', [EmployeePerformanceController ::class, 'index']);
    Route::get('/employeePerformance/show/{id}', [EmployeePerformanceController::class, 'show']);

    Route::post('/employeePerformance/store', [EmployeePerformanceController::class, 'store']);
    Route::put('/employeePerformance/update/{id}', [EmployeePerformanceController::class, 'update']);
    Route::delete('/employeePerformance/destroy/{id}', [EmployeePerformanceController::class, 'destroy']);
});
