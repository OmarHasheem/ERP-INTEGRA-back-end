<?php

use App\Http\Controllers\HRControllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::controller(EmployeeController::class)->group(function () {
    Route::prefix('HR')->group(function (){
        Route::get('/employees', 'index')->middleware('permission:index employee');        
        Route::get('/employee/show/{id}', 'show')->middleware('permission:store employee');
        Route::post('/employee/store', 'store')->middleware('permission:show employee');
        Route::put('/employee/update/{id}', 'update')->middleware('permission:update employee');
        Route::delete('/employee/destroy/{id}', 'destroy')->middleware('permission:destroy employee');
        Route::post('/employee/attachBenefitToEmployee/{id}', 'attachBenefitToEmployee')->middleware('can:attach employee');
    });
});

