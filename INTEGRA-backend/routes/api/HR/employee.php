<?php

use App\Http\Controllers\HRControllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::controller(EmployeeController::class)->group(function () {
    Route::prefix('hr')->group(function (){

        // Route::get('/employees/{id}', 'show')->middleware('permission:show employee');        
        // Route::get('/employees', 'index')->middleware('permission:index employee');
        // Route::post('/employees/{id}', 'attachBenefitToEmployee')->middleware('permssion:attach employee');
        // Route::post('/employees', 'store')->middleware('permission:store employee');
        // Route::put('/employees/{id}', 'update')->middleware('permission:update employee');
        // Route::delete('/employees/{id}', 'destroy')->middleware('permission:destroy employee');

        Route::get('/employees/{id}', 'show');        
        Route::get('/employees', 'index');
        Route::get('/employees/employeeDetails/{id}', 'showEmployeeDetails');
        Route::post('/employees/{id}', 'attachBenefitToEmployee');
        Route::post('/employees', 'store');
        Route::put('/employees/{id}', 'update');
        Route::delete('/employees/{id}', 'destroy');

        
            });
});

