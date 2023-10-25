<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('auth.login.view');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::group(['prefix' => 'master'], function () {
        Route::get('/car', [CarController::class, 'index'])->name('car.list');
        Route::get('/car/form', [CarController::class, 'formCreateBrand'])->name('car.form-create');
        Route::get('/car/form/{id}', [CarController::class, 'formEditBrand'])->name('car.form-edit');

        Route::post('/car/brand', [CarController::class, 'createCarBrand'])->name('car.create-brand');
        Route::delete('/car/brand/{id}', [CarController::class, 'deleteCarBrandById'])->name('car.delete-brand');
        Route::post('/car/brand/{id}', [CarController::class, 'updateCarBrand'])->name('car.update-brand');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/list', [UserController::class, 'index'])->name('user.list');

        Route::delete('/{id}', [UserController::class, 'deleteUserById'])->name('user.delete');
    });
});
