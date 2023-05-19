<?php

use App\Http\Controllers\HRControllers\EmployeeController;
use Illuminate\Support\Facades\Route;


Route::prefix('HR')->group(function (){
    Route::get('/employees', [EmployeeController::class, 'index'])->middleware('can:index employee');
    Route::get('/employee/show/{id}', [EmployeeController::class, 'show'])->middleware('can:show employee');
    Route::post('/employee/store', [EmployeeController::class, 'store'])->middleware('can:store employee');
    Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->middleware('can:update employee');
    Route::delete('/employee/destroy/{id}', [EmployeeController::class, 'destroy'])->middleware('can:destroy employee');
    Route::post('/employee/attachBenefitToEmployee/{id}', [EmployeeController::class, 'attachBenefitToEmployee'])->middleware('can:attach employee');
});
