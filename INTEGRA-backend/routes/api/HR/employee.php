<?php

use App\Http\Controllers\HRControllers\EmployeeController;
use Illuminate\Support\Facades\Route;


Route::prefix('HR')->group(function (){
    Route::get('/employees', [EmployeeController::class, 'index']);
    Route::get('/employee/show/{id}', [EmployeeController::class, 'show']);

    Route::post('/employee/store', [EmployeeController::class, 'store']);
    Route::put('/employee/update/{id}', [EmployeeController::class, 'update']);
    Route::delete('/employee/destroy/{id}', [EmployeeController::class, 'destroy']);

    Route::post('/employee/attachBenefitToEmployee/{id}', [EmployeeController::class, 'attachBenefitToEmployee']);
});
