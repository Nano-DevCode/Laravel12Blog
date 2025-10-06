<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('admin.dashboard');
})->name('dashboard');

Route::resource('categories', CategoryController::class);

Route::resource('posts', PostController::class);

Route::resource('permissions', PermissionController::class);

Route::resource('roles', RoleController::class);

