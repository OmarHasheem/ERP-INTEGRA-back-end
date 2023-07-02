<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
<<<<<<< HEAD
Route::prefix('userMangement')->group(function(){
    // Route::get('/users/userRoles/{id}', 'showUserRoles')->middleware('permission:show UserRoles');
    // Route::get('/users/{id}','show')->middleware('permission:show user');
    // Route::get('/users', 'index')->middleware('permission:index user');
    // Route::post('/users', 'store')->middleware('permission:store user');
    // Route::delete('/users/{id}', 'destroy')->middleware('permission:destroy user');
    // Route::put('/users/{id}',  'update')->middleware('permission:update user');

=======
Route::prefix('userManagement')->group(function(){
>>>>>>> 88f9ccd9c23e1c185b2b207544562efd52868495
    Route::get('/users/userRoles/{id}', 'showUserRoles');
    Route::get('/users/{id}','show');
    Route::get('/users', 'index');
    Route::post('/users', 'store');
    Route::delete('/users/{id}', 'destroy');
    Route::put('/users/{id}',  'update');
});
    Route::get('/getMe', 'getMe');
});
