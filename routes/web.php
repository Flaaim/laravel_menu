<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::middleware('guest')->group(function(){
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::controller(RoleController::class)->group(function(){
        Route::get('/roles', 'view')->name('roles.view');
        Route::get('/role/create', 'create')->name('role.create');
        Route::post('/role', 'store')->name('role.store');
        Route::get('/edit/{role}', 'edit')->name('role.edit');
        Route::put('/{role}', 'update')->name('role.update');
    });


    Route::controller(PermissionController::class)->group(function(){
        Route::get('/permissions', 'view')->name('permissions.view');
        Route::post('/permissions', 'store')->name('permissions.store');
    });

});