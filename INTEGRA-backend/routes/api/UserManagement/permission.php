<?php

use App\Http\Controllers\UserManagementController\PermissionController;
use Illuminate\Support\Facades\Route;


Route::controller(PermissionController::class)->group(function () {
<<<<<<< HEAD
Route::prefix('userMangement')->group(function(){
    // Route::get('/permissions/{id}', 'showPermissionRoles')->middleware('permission:show PermissionRoles');
    // Route::get('/permissions', 'index')->middleware('permission:index permission');

=======
Route::prefix('userManagement')->group(function(){
>>>>>>> 88f9ccd9c23e1c185b2b207544562efd52868495
    Route::get('/permissions/{id}', 'showPermissionRoles');
    Route::get('/permissions', 'index');



});
});
