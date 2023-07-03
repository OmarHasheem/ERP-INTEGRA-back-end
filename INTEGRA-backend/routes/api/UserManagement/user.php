<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
Route::prefix('userManagement')->group(function(){
    Route::get('/users/userRoles/{id}', 'showUserRoles');
    Route::get('/users/{id}','show');
    Route::get('/users', 'index');
    Route::post('/users', 'store');
    Route::delete('/users/{id}', 'destroy');
    Route::put('/users/{id}',  'update');
});
    Route::get('/getMe', 'getMe');
});
