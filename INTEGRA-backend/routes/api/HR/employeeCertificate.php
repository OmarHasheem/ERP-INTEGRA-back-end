<?php

use App\Http\Controllers\HRControllers\EmployeeCertificateController;
use Illuminate\Support\Facades\Route;


Route::controller(EmployeeCertificateController::class)->group(function () {
    Route::prefix('HR')->group(function (){
        Route::get('/employeeCertificates', 'index')->middleware('permission:index employeeCertificate');        
        Route::get('/employeeCertificate/show/{id}', 'show')->middleware('permission:store employeeCertificate');
        Route::post('/employeeCertificate/store', 'store')->middleware('permission:show employeeCertificate');
        Route::put('/employeeCertificate/update/{id}', 'update')->middleware('permission:update employeeCertificate');
        Route::delete('/employeeCertificate/destroy/{id}', 'destroy')->middleware('permission:destroy employeeCertificate');
    });
});

