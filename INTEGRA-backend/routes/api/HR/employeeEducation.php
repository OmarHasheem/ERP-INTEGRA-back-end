<?php

use App\Http\Controllers\HRControllers\EmployeeEducationController;
use Illuminate\Support\Facades\Route;


Route::prefix('HR')->group(function (){
    Route::get('/employeeEducations', [EmployeeEducationController  ::class, 'index']);
    Route::get('/employeeEducation/show/{id}', [EmployeeEducationController::class, 'show']);

    Route::post('/employeeEducation/store', [EmployeeEducationController::class, 'store']);
    Route::put('/employeeEducation/update/{id}', [EmployeeEducationController::class, 'update']);
    Route::delete('/employeeEducation/destroy/{id}', [EmployeeEducationController::class, 'destroy']);
});
