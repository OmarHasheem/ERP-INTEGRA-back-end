<?php

use App\Http\Controllers\HRControllers\EmployeeEducationController;
use Illuminate\Support\Facades\Route;

Route::controller(EmployeeEducationController::class)->group(function () {
    Route::prefix('HR')->group(function (){
        Route::get('/employeeEducations', 'index')->middleware('permission:index employeeEducation');        
        Route::get('/employeeEducation/show/{id}', 'show')->middleware('permission:store employeeEducation');
        Route::post('/employeeEducation/store', 'store')->middleware('permission:show employeeEducation');
        Route::put('/employeeEducation/update/{id}', 'update')->middleware('permission:update employeeEducation');
        Route::delete('/employeeEducation/destroy/{id}', 'destroy')->middleware('permission:destroy employeeEducation');
    });
});

