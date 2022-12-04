<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'login']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/reset-password', [AuthController::class, 'resetPassword']);

Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'googleCallback');
});

Route::middleware('auth')->group(function() {
    Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/assets', [AssetController::class, 'index']);
    Route::get('/assets/create', [AssetController::class, 'create']);
    Route::get('/assets/{asset}/show', [AssetController::class, 'show']);
    Route::get('/assets/{asset}/edit', [AssetController::class, 'edit']);

    Route::get('/companies', [CompanyController::class, 'index']);
    Route::get('/companies/create', [CompanyController::class, 'create']);
    Route::get('/companies/{asset}/show', [CompanyController::class, 'show']);
    Route::get('/companies/{asset}/edit', [CompanyController::class, 'edit']);

    Route::get('/departments', [DepartmentController::class, 'index']);
    Route::get('/departments/create', [DepartmentController::class, 'create']);
    Route::get('/departments/{asset}/show', [DepartmentController::class, 'show']);
    Route::get('/departments/{asset}/edit', [DepartmentController::class, 'edit']);

    Route::get('/loans', [LoanController::class, 'index']);
    Route::get('/loans/create', [LoanController::class, 'create']);
    Route::get('/loans/{asset}/show', [LoanController::class, 'show']);
    Route::get('/loans/{asset}/edit', [LoanController::class, 'edit']);

    Route::get('/roles', [RoleController::class, 'index']);
    Route::get('/roles/create', [RoleController::class, 'create']);
    Route::get('/roles/{role}/show', [RoleController::class, 'show']);
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit']);

    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/create', [UserController::class, 'create']);
    Route::get('/users/{user}/show', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit']);
    Route::put('/users/{user}', [UserController::class, 'update']);
});




