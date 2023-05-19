<?php

use App\Http\Controllers\HRControllers\EmployeeEducationController;
use Illuminate\Support\Facades\Route;


Route::prefix('HR')->group(function (){
    Route::get('/employeeEducations', [EmployeeEducationController  ::class, 'index'])->middleware('can:index campaign');
    Route::get('/employeeEducation/show/{id}', [EmployeeEducationController::class, 'show'])->middleware('can:index campaign');

    Route::post('/employeeEducation/store', [EmployeeEducationController::class, 'store'])->middleware('can:index campaign');
    Route::put('/employeeEducation/update/{id}', [EmployeeEducationController::class, 'update'])->middleware('can:index campaign');
    Route::delete('/employeeEducation/destroy/{id}', [EmployeeEducationController::class, 'destroy'])->middleware('can:index campaign');
});
