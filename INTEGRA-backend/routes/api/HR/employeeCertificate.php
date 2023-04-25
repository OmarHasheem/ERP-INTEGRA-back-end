<?php

use App\Http\Controllers\HRControllers\EmployeeCertificateController;
use Illuminate\Support\Facades\Route;


Route::prefix('HR')->group(function (){
    Route::get('/employeeCertificates', [EmployeeCertificateController  ::class, 'index']);
    Route::get('/employeeCertificate/show/{id}', [EmployeeCertificateController::class, 'show']);

    Route::post('/employeeCertificate/store', [EmployeeCertificateController::class, 'store']);
    Route::put('/employeeCertificate/update/{id}', [EmployeeCertificateController::class, 'update']);
    Route::delete('/employeeCertificate/destroy/{id}', [EmployeeCertificateController::class, 'destroy']);
});
